<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseAsyncController.php');

require_once(APPPATH . 'classes/repositories/employees/EmployeesRepository.php');
require_once(APPPATH . 'classes/repositories/employees/EmployeeStatusFilter.php');
class Employees extends PulseAsyncController
{

	public function __construct() {
		parent::__construct();

		$this->employees = new Pulse\Data\EmployeesRepository();
	}

	/**
	 * @Permission('employees', 'view')
	 */
	public function browseEmployees() {

		$filter = new Pulse\Data\EmployeeFilter($this);
		$data = $this->employees->getEmployees($filter);
		$count = $this->employees->countEmployees($filter);
		
		$statusFilter = new Pulse\Data\EmployeeStatusFilter();
		$response = array(
			'page' => (int) $filter->getPage()
			, 'total' => ceil($count / $filter->getRows())
			, 'records' => $count
			, 'rows' => array()
		);

		foreach($data as $entry) {
			$statusFilter->setEmployeeId($entry->getId());
			$status = $this->employees->getEmployeeStatus($statusFilter);
			$response['rows'][] = array(
				'id' => $entry->getId()
				, 'cell' => array(
					$entry->getContact()->getFamilyName()
					, $entry->getContact()->getGivenName()
					, $entry->getCode()
					, $entry->getTagNo()
					, $status->getPosition()
				)
			);
		}

		$this->_success($response);
	}

}
