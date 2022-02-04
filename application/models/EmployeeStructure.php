<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('StructureDetail.php');
require_once('Structure.php');
require_once('Employee.php');

/**
 * @Entity
 * @Table(name="EmployeeStructure")
 * @HasLifecycleCallbacks
 */
class EmployeeStructure extends \Antiferno\Data\DataObject
{
	/**
	 * @ManyToOne(targetEntity="Employee")
	 * @JoinColumn(name="EmployeeID", referencedColumnName="ID")
     * @var Employee
	 */
	protected $employee;
    
    /**
	 * @Column(type="integer", name="EmployeeID")
	 * @var int
	 */
	protected $employeeID;
    
    /**
	 * @ManyToOne(targetEntity="Structure")
	 * @JoinColumn(name="StructureID", referencedColumnName="ID")
     * @var Structure
	 */
	protected $structure;
    
    /**
	 * @Column(type="integer", name="StructureID")
	 * @var int
	 */
	protected $structureID;
    
    /**
	 * @ManyToOne(targetEntity="StructureDetail")
	 * @JoinColumn(name="StructureDetailID", referencedColumnName="ID")
     * @var StructureDetail
	 */
	protected $detail;
    
    /**
	 * @Column(type="integer", name="StructureDetailID")
	 * @var int
	 */
	protected $structureDetailID;   
    
    /**
	 * @Column(type="date", name="StartDate")
	 * @var \DateTime
	 */
	protected $startDate;
    
    /**
	 * @Column(type="date", name="EndDate")
	 * @var \DateTime
	 */
	protected $endDate;
    
    public function getEmployee() {
		return $this->employee;
	}
    
    public function getStructure() {
		return $this->structure;
	}
    
    public function getDetail() {
		return $this->detail;
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
