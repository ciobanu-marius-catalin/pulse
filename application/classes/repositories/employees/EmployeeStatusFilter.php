<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

class EmployeeStatusFilter extends \Repositories\BaseFilter
{

	protected $employeeId;
	protected $position;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getEmployeeId() {
		return $this->employeeId;
	}

	public function setEmployeeId($employeeId) {
		$this->employeeId = $employeeId;
	}

	public function getPosition() {
		return $this->position;
	}

	public function setPosition($position) {
		$this->position = $position;
	}

}
