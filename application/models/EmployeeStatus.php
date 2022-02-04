<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('Employee.php');

/**
 * @Entity
 * @Table(name="EmployeeStatus")
 * @HasLifecycleCallbacks
 */
class EmployeeStatus extends \Antiferno\Data\DataObject
{
	/**
	 * @ManyToOne(targetEntity="Employee")
	 * @JoinColumn(name="EmployeeID", referencedColumnName="ID")
     * @var Employee
	 */
	protected $employee;
	
	/** @Column(type="string", name="EmployeeID") */
	protected $employeeId;
    
    /** @Column(type="string", name="Position") */
	protected $position;
    
     /**
	 * @Column(type="datetime", name="StartDate")
	 * @var \DateTime
	 */
	protected $startDate;
    
    /**
	 * @Column(type="datetime", name="EndDate")
	 * @var \DateTime
	 */
	protected $endDate;
	
	public function getEmployee() {
        return $this->employee;
	}
	
	public function getEmployeeId(){
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
    
    public function getStartDate() {
		return $this->startDate;
	}

	public function setStartDate(\DateTime $startDate) {
		return $this->startDate = $startDate;
	}
    
    public function getEndDate() {
		return $this->endDate;
	}

	public function setEndDate(\DateTime $endDate) {
		return $this->endDate = $endDate;
	}
}
