<?php

namespace Pulse\Data;

use Doctrine\ORM\Query\Expr\Join;

require_once(APPPATH . 'classes/repositories/BaseRepository.php');
require_once(APPPATH . 'models/infrastructure/Permission.php');
require_once('AuthFilter.php');

class Auth extends \Repositories\BaseRepository
{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * 
	 * @param \pulse\data\AuthFilter $filter
	 * @return \Doctrine\ORM\QueryBuilder
	 */
	protected function _queryAuthorizations(AuthFilter $filter) {
		$query = $this->entityManager->createQueryBuilder();

		$query->select('p')
				->from('pulse\models\Permission', 'p')
				->leftJoin('p.group', 'pg',
						Join::WITH,
						'pg.deleted = 0')
				->leftJoin('pg.authActions', 'ga',
						Join::WITH,
						'ga.name = :action AND ga.deleted = 0')
				->leftJoin('p.action', 'pa',
						Join::WITH,
						'pa.deleted = 0')
				->leftJoin('pa.authActionGroup', 'paa',
						Join::WITH,
						'paa.deleted = 0');

		$query->where('p.deleted = 0');

		$date = $filter->getReferenceDate();
		if( $date == null )
			$date = new \DateTime();

		$parameters = [
				'date' => $date,
				'action' => $filter->getActionName(),
				'group' => $filter->getGroupName()
			];

		$query->andWhere('p.startDate <= :date')
				->andWhere($query->expr()->orX(
						$query->expr()->isNull('p.endDate'),
						$query->expr()->gte('p.endDate', ':date')
			));
		
		$query->andWhere($query->expr()->orX(
				$query->expr()->andX(
						$query->expr()->eq('pa.name', ':action'),
						$query->expr()->eq('paa.name', ':group')
					),
				$query->expr()->andX(
						$query->expr()->eq('pg.name', ':group'),
						$query->expr()->isNotNull('ga.id')
					)
			));

		if ($filter->getUserId() && $filter->getRoleId())
		{
			$parameters['roleIds'] = is_array($filter->getRoleId()) ? $filter->getRoleId() : [$filter->getRoleId()];
			$parameters['userId'] = $filter->getUserId();

			$query->andWhere($query->expr()->orX(
					$query->expr()->eq('p.userId', ':userId'),
					$query->expr()->in('p.roleId', ':roleIds')
				));
		}
		else if ($filter->getUserId())
		{
			$parameters['userId'] = $filter->getUserId();

			$query->andWhere('p.userId = :userId');
		}
		else if ($filter->getRoleId())
		{
			$parameters['roleIds'] = is_array($filter->getRoleId()) ? $filter->getRoleId() : [$filter->getRoleId()];

			$query->andWhere('p.roleId IN (:roleIds)');
		}

		// Parameters
		$query->setParameters($parameters);

		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true); 
	}

	public function isAuthorized(AuthFilter $filter) {
		if( !$filter->getActionName() || !$filter->getGroupName() )
			return false;

		$authorizations = $this->_queryAuthorizations($filter);

		if( count($authorizations) == 0 )
			return false;

		foreach($authorizations as $auth) {
			if( !$auth->getAccess() )
				return false;
		}

		return true;
	}

}
