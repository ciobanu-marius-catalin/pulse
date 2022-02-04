<?php

namespace Pulse\Data;

use Doctrine\ORM\QueryBuilder as QueryBuilder;
use Repositories\BaseRepository as BaseRepository;
use Doctrine\ORM\Query\Expr\Join;

require_once(APPPATH . 'classes/repositories/BaseRepository.php');
require_once(APPPATH . 'models/infrastructure/Contact.php');
require_once(APPPATH . 'models/Employee.php');
require_once(APPPATH . 'models/infrastructure/User.php');
require_once(APPPATH . 'models/EmployeeStructure.php');
require_once(APPPATH . 'models/EmployeeStatus.php');

require_once('EmployeeFilter.php');

class EmployeesRepository extends BaseRepository
{

	public function __construct() {
		parent::__construct();
	}

	protected function _queryEmployees(EmployeeFilter $filter) {

		$query = $this->entityManager->createQueryBuilder();

		$query->select('e');

		$query->from('\Pulse\Models\Employee', 'e');

		$query->innerJoin('\Pulse\Models\Contact ', 'c', Join::WITH, 'e.contactID =c.id and c.deleted=0');

		if( $filter->getPosition() || array_key_exists('position', $filter->getSort()) ) {
			$query->innerJoin(
					'\Pulse\Models\EmployeeStatus', 'es', Join::WITH, 'es.employeeId = e.id AND es.deleted = 0');
			
			$this->filterReferenceDate($query, $filter, 'es');
		}
		$query->andWhere('e.deleted=0');

		if( $filter->getUserId() ) {
			$query->andWhere('e.userID=:userID AND e.deleted=0')
					->setParameter('userID', $filter->getUserId());
		}

		if( $filter->getContactId() ) {
			$query->andWhere(':contactID=c.id AND e.deleted=0')
					->setParameter('contactID', $filter->getContactId());
		}

		if( $filter->getFamilyName() ) {
			$query->andWhere('c.familyName=:familyName AND e.deleted=0')
					->setParameter('familyName', $filter->getFamilyName());
		}

		if( $filter->getGivenName() ) {
			$query->andWhere('c.givenName=:givenName AND e.deleted=0')
					->setParameter('givenName', $filter->getGivenName());
		}

		if( $filter->getEmail() ) {
			$query->andWhere('c.email=:email AND e.deleted=0')
					->setParameter('email', $filter->getEmail());
		}

		if( $filter->getCode() ) {
			$query->andWhere('e.code =:code')
					->setParameter('code', $filter->getCode());
		}

		if( $filter->getTagNo() ) {
			$query->andWhere('e.tagNo =:tagNo')
					->setParameter('tagNo', $filter->getTagNo());
		}

		if( $filter->getPosition() ) {
			$query->andWhere('es.position = :position')
					->setParameter('position', $filter->getPosition());
		}

		$sort = array();

		foreach($filter->getSort() as $idx => $ord) {
			switch( $idx ) {
				case 'userID': $sort['u.id'] = $ord;
					break;
				case 'contactID': $sort['c.id'] = $ord;
					break;
				case 'familyName': $sort['c.familyName'] = $ord;
					break;
				case 'givenName': $sort['c.givenName'] = $ord;
					break;
				case 'email': $sort['c.email'] = $ord;
					break;
				case 'code': $sort['e.code'] = $ord;
					break;
				case 'tagNo': $sort['e.tagNo'] = $ord;
					break;
				case 'position': $sort['es.position'] = $ord;
					break;
			}
		}

		$this->sortAndLimit($query, $sort, $filter);

		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countEmployees(EmployeeFilter $filter) {

		$data = $this->_queryEmployees($filter);

		return $data->count();
	}

	public function getEmployees(EmployeeFilter $filter) {

		$data = $this->_queryEmployees($filter);

		return $data;
	}

	public function getEmployee($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('Pulse\Models\Employee', $arg);
		else if( $arg instanceof EmployeeFilter ) {
			$employees = $this->getEmployees($arg);

			if( count($employees) == 1 )
				return $employees->getIterator()->current();
		}
		else
			return null;
	}

	protected function _queryEmployeeStatuses(EmployeeStatusFilter $filter) {
		$query = $this->entityManager->createQueryBuilder();

		$query->select('es');

		$query->from('\Pulse\Models\EmployeeStatus', 'es');

		$query->andWhere('es.deleted = 0');

		$this->filterReferenceDate($query, $filter, 'es');

		if( $filter->getEmployeeId() ) {
			$query->andWhere('es.employeeId = :employeeId')
					->setParameter('employeeId', $filter->getEmployeeId());
		}

		if( $filter->getPosition() ) {
			$query->andWhere('es.position = :position')
					->setParameter('position', $filter->getPosition());
		}

		$sort = array();

		foreach($filter->getSort() as $idx => $ord) {
			switch( $idx ) {
				case 'position' : $sort['es.position'] = $ord;
					break;
			}
		}

		$this->sortAndLimit($query, $sort, $filter);

		return new \Doctrine\ORM\Tools\Pagination\Paginator($query, $fetchJoinCollection = true);
	}

	public function countEmployeeStatuses(EmployeeStatusFilter $filter) {
		$data = $this->_queryEmployeeStatuses($filter);

		return $data->count();
	}

	public function getEmployeeStatuses(EmployeeStatusFilter $filter) {
		$data = $this->_queryEmployeeStatuses($filter);

		return $data;
	}

	public function getEmployeeStatus($arg) {
		if( is_numeric($arg) )
			return $this->entityManager->find('\Pulse\Models\EmployeeStatus', $arg);
		else if( $arg instanceof EmployeeStatusFilter ) {
			$status = $this->getEmployeeStatuses($arg);

			if( count($status) == 1 )
				return $status->getIterator()->current();
		}
		else
			return null;
	}

}
