<?php

namespace Pulse\Data;

use Doctrine\ORM\Query\Expr\Join;

require_once(APPPATH . 'classes/repositories/BaseRepository.php');
require_once(APPPATH . 'models/infrastructure/Permission.php');

class AuthorizationsRepository extends \Repositories\BaseRepository
{

	public function __construct() {
		parent::__construct();
	}

	protected function _queryActions(ActionFilter $filter) {
		$query = $this->entityManager->createQueryBuilder();

		$query->select('aa');

		$query->from('\Pulse\Models\AuthAction', 'aa');

		if( $filter->getGroupName() || array_key_exists('groupName', $filter->getSort())
				|| $filter->getSearchGroupName() ) {
			$query->innerJoin
					(
					'\Pulse\Models\AuthActionGroup'
					, 'aag'
					, Join::WITH
					, 'aa.actionGroupId = aag.id'
					. ' AND aag.deleted = 0'
					);
		}
		$query->andWhere('aa.deleted = 0');

		if( $filter->getActionName() ) {
			$query->andWhere('aa.name = :action')
					->setParameter('action', $filter->getActionName());
		}

		if( $filter->getId() ) {
			$query->andWhere('aa.id = :actionId')
					->setParameter('actionId', $filter->getId());
		}

		if( $filter->getDescription() ) {
			$query->andWhere('aa.description = :description')
					->setParameter('description', $filter->getDescription());
		}

		if( $filter->getGroupName() ) {
			$query->andWhere('aag.name = :groupName')
					->setParameter('groupName', $filter->getGroupName());
		}
		
		if( $filter->getSearchActionName() ) {
			$query->andWhere('UPPER(aa.name) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchActionName() . '%');
		}
		
		if( $filter->getSearchGroupName() ) {
			$query->andWhere('UPPER(aag.name) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchGroupName() . '%');
		}
		
		if( $filter->getSearchDescription() ) {
			$query->andWhere('UPPER(aa.description) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearchDescription() . '%');
		}

		$sort = array();

		foreach($filter->getSort() as $idx => $ord) {
			switch( $idx ) {
				case 'actionName' : $sort['aa.name'] = $ord;
					break;
				case 'groupName' : $sort['aag.name'] = $ord;
					break;
				case 'description' : $sort['aa.description'] = $ord;
					break;
			}
		}

		$this->sortAndLimit($query, $sort, $filter);
		
		
		//throw new \Exception($query->getQuery()->getSQL());
		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countActions(ActionFilter $filter) {
		$data = $this->_queryActions($filter);

		return $data->count();
	}

	public function getActions(ActionFilter $filter) {

		$data = $this->_queryActions($filter);
		
		//throw new \Exception($data->getQuery()->getSQL());
		
		
		return $data;
	}

	public function getAction($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('\Pulse\Models\AuthAction', $arg);
		else if( $arg instanceof ActionFilter ) {
			$actions = $this->getActions($arg);

			if( count($actions) == 1 )
				return $actions->getIterator()->current();
		}
		else
			return null;
	}

	protected function _queryGroups(GroupFilter $filter) {
		$query = $this->entityManager->createQueryBuilder();

		$query->select('aag');

		$query->from('\Pulse\Models\AuthActionGroup', 'aag');

		if( $filter->getActionName() || array_key_exists('actionName', $filter->getSort()) ) {
			$query->innerJoin
					(
					'Pulse\Models\AuthAction'
					, 'aa'
					, Join::WITH
					, 'aa.actionGroupId = aag.id'
					. ' AND aa.deleted = 0'
					);
		}

		$query->Where('aag.deleted = 0');

		if( $filter->getId() ) {
			$query->andWhere('aag.id = :groupId')
					->setParameter('groupId', $filter->getId());
		}

		if( $filter->getGroupName() ) {
			$query->andWhere('aag.name = :groupName')
					->setParameter('groupName', $filter->getGroupName());
		}

		if( $filter->getDescription() ) {
			$query->andWhere('aag.description = :description')
					->setParameter('description', $filter->getDescription());
		}

		if( $filter->getActionName() ) {
			$query->andWhere('aa.name = :actionName')
					->setParameter('actionName', $filter->getActionName());
		}

		if( $filter->getSearch() ) {
			$query->andWhere('UPPER(aag.name) LIKE UPPER(:search)')
					->setParameter('search', '%' . $filter->getSearch() . '%');
		}

		$sort = array();


		foreach($filter->getSort() as $idx => $ord) {
			switch( $idx ) {
				case 'actionName' : $sort['aa.name'] = $ord;
					break;
				case 'groupName' : $sort['aag.name'] = $ord;
					break;
				case 'description' : $sort['aag.description'] = $ord;
					break;
			}
		}

		$this->sortAndLimit($query, $sort, $filter);



		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countGroups(GroupFilter $filter) {
		$data = $this->_queryGroups($filter);

		return $data->count();
	}

	public function getGroups(GroupFilter $filter) {
		$data = $this->_queryGroups($filter);
		return $data;
	}

	public function getGroup($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('\Pulse\Models\AuthActionGroup', $arg);
		else if( $arg instanceof GroupFilter ) {
			$group = $this->getGroups($arg);

			if( count($group) == 1 )
				return $group->getIterator()->current();
		}
		else
			return null;
	}

	protected function _queryPermissions(PermissionFilter $filter) {
		$query = $this->entityManager->createQueryBuilder();

		$query->select('p');

		$query->from('\Pulse\Models\Permission', 'p');

		if( $filter->getGroupName() || array_key_exists('groupName', $filter->getSort()) ) {
			$query->innerJoin
					(
					'Pulse\Models\AuthActionGroup'
					, 'aag'
					, Join::WITH
					, 'p.groupId = aag.id'
					. ' AND aag.deleted = 0'
			);
		}

		if( $filter->getActionName() || array_key_exists('actionName', $filter->getSort()) ) {
			$query->innerJoin
					(
					'\Pulse\Models\AuthAction'
					, 'aa'
					, Join::WITH
					, 'p.actionId = aa.id'
					. ' AND aa.deleted = 0'
			);
		}

		if( $filter->getUsername() || array_key_exists('username', $filter->getSort()) ) {
			$query->innerJoin
					(
					'\Pulse\Models\User'
					, 'u'
					, Join::WITH
					, 'p.userId = u.id'
					. ' AND u.deleted = 0');
		}

		if( $filter->getRoleName() || array_key_exists('roleName', $filter->getSort()) ) {
			$query->innerJoin
					(
					'\Pulse\Models\Role'
					, 'r'
					, Join::WITH, 'p.roleId = r.id' .
					' AND r.deleted = 0'
			);
		}

		$query->Where('p.deleted = 0');

		$this->filterReferenceDate($query, $filter, 'p');

		if( $filter->getId() ) {
			$query->andWhere('p.id = :id')
					->setParameter('id', $filter->getId());
		}

		if( $filter->getGroupId() ) {
			$query->andWhere('p.groupId = :groupId')
					->setParameter('groupId', $filter->getGroupId());
		}

		if( $filter->getActionId() ) {
			$query->andWhere('p.actionId = :actionId')
					->setParameter('actionId', $filter->getActionId());
		}

		if( $filter->getUserId() ) {
			$query->andWhere('p.userId = :userId')
					->setParameter('userId', $filter->getUserId());
		}

		if( $filter->getRoleId() ) {
			$query->andWhere('p.roleId = :roleId')
					->setParameter('roleId', $filter->getRoleId());
		}

		if( $filter->getAccess() ) {
			$query->andWhere('p.access = :access')
					->setParameter('access', $filter->getAccess());
		}

		if( $filter->getActionName() ) {
			$query->andWhere('aa.name = :actionName')
					->setParameter('actionName', $filter->getActionName());
		}

		if( $filter->getGroupName() ) {
			$query->andWhere('aag.name = :groupName')
					->setParameter(':groupName', $filter->getGroupName());
		}

		if( $filter->getUsername() ) {
			$query->andWhere('u.username = :username')
					->setParameter('username', $filter->getUsername());
		}

		if( $filter->getRoleName() ) {
			$query->andWhere('r.name = :roleName')
					->setParameter('roleName', $filter->getRoleName());
		}

		$sort = array();

		foreach($filter->getSort() as $idx => $ord) {
			switch( $idx ) {
				case 'actionName' : $sort['aa.name'] = $ord;
					break;
				case 'groupName' : $sort['aag.name'] = $ord;
					break;
				case 'username' : $sort['u.username'] = $ord;
					break;
				case 'roleName' : $sort['r.name'] = $ord;
			}
		}

		$this->sortAndLimit($query, $sort, $filter);

		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countPermissions(PermissionFilter $filter) {
		$data = $this->_queryPermissions($filter);

		return $data->count();
	}

	public function getPermissions(PermissionFilter $filter) {
		$data = $this->_queryPermissions($filter);

		return $data;
	}

	public function getPermission($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('\Pulse\Models\Permission', $arg);
		else if( $arg instanceof PermissionFilter ) {
			$permission = $this->getPermissions($arg);

			if( count($permission) == 1 )
				return $permission->getIterator()->current();
		}
		else
			return null;
	}

	public function addAction(AddActionInput $input) {
		$this->entityManager->getConnection()->beginTransaction();
		try {
			$action = new \pulse\models\AuthAction;
			$authorization = new \Pulse\Data\AuthorizationsRepository();
			$filter = new \Pulse\Data\GroupFilter();

			$filter->setGroupName($input->getResourceName());
			$resource = $authorization->getGroup($filter);

			if( $resource == NULL ) {
				$resource = new \pulse\models\AuthActionGroup();
				$resource->setName($input->getResourceName());
				$resource->setDescription($input->getResourceDescription());
				$action->setAuthActionGroup($resource);
				$this->entityManager->persist($resource);
			}
			else {
				$action->setAuthActionGroup($resource);
			}

			$action->setName($input->getActionName());
			$action->setDescription($input->getActionDescription());

			$this->entityManager->persist($action);
			$this->entityManager->flush();
			$this->entityManager->getConnection()->commit();
			
			return $action;
		}
		catch(Exception $exception) {
			$this->entityManager->getConnection()->rollback();
			throw $exception;
		}
	}

	public function deleteAction(DeleteActionInput $input) {
		$this->entityManager->getConnection()->beginTransaction();
		try {
			//$authorization = new \Pulse\Data\AuthorizationsRepository();
			
			//$filter = new \Pulse\Data\ActionFilter();
			//$filter->setId($input->getActionId());
			//$action = $authorization->getAction($filter);
			$action = $this->entityManager->getReference('\Pulse\Models\AuthAction', $input->getActionId());
			
			$action->setDeleted(1);

			$this->entityManager->flush();
			$this->entityManager->getConnection()->commit();
		}
		catch(Exception $exception) {
			$this->entityManager->getConnection()->rollback();
			throw $exception;
		}
	}

	public function updateAction(UpdateActionInput $input) {
		$this->entityManager->getConnection()->beginTransaction();
		try {
			
			$authorization = new \Pulse\Data\AuthorizationsRepository();
			$action = $this->entityManager->getReference('\Pulse\Models\AuthAction', $input->getActionId());
			
			//$action = $authorization->getAction($input->getActionId());

			$filter = new \Pulse\Data\GroupFilter();
			$filter->setGroupName($input->getResourceName());
			$resource = $authorization->getGroup($filter);

			if( $resource == NULL ) {
				$resource = new \pulse\models\AuthActionGroup();
				$resource->setName($input->getResourceName());
				$resource->setDescription($input->getResourceDescription());
				$action->setAuthActionGroup($resource);
				$this->entityManager->persist($resource);
			}
			else {
				$resource->setDescription($input->getResourceDescription());
				$action->setAuthActionGroup($resource);
			}

			$action->setName($input->getActionName());
			$action->setDescription($input->getActionDescription());

			$this->entityManager->flush();
			$this->entityManager->getConnection()->commit();
			
			return $action;
		}
		catch(Exception $exception) {
			
			
			$this->entityManager->getConnection()->rollback();
			throw $exception;
		}
	}

}
