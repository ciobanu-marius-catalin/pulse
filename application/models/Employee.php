<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once(APPPATH . 'models/infrastructure/Contact.php');
require_once(APPPATH . 'models/infrastructure/User.php');
require_once('EmployeeStatus.php');
require_once('EmployeeStructure.php');

/**
 * @Entity
 * @Table(name="Employee")
 * @HasLifecycleCallbacks
 */
class Employee extends \Antiferno\Data\DataObject
{    
    /**
	 * @ManyToOne(targetEntity="Contact")
	 * @JoinColumn(name="ContactID", referencedColumnName="ID")
     * @var Contact
	 */
    protected $contact;
    
    /**
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="UserID", referencedColumnName="ID")
     * @var User
	 */
	protected $user;
    
    /**
     * @OneToMany(targetEntity="EmployeeStatus", mappedBy="employee")
     */
    protected $employeesStatus;
    
    /**
     * @OneToMany(targetEntity="EmployeeStructure", mappedBy="employee")
     */
    protected $employeesStructure;    
    
    /**
	 * @Column(type="integer", name="UserID")
	 * @var int
	 */
	protected $userID;
    
    /**
	 * @Column(type="integer", name="ContactID")
	 * @var int
	 */
	protected $contactID;
    
	/** @Column(type="string", name="Code") */
	protected $code;

	/** @Column(type="string", name="TagNo") */
	protected $tagNo;
    
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
    
    public function getContact() {
		return $this->contact;
	}
    
    public function getUser() {
		return $this->user;
	}
    public function getUserId() {
		return $this->userID;
	}

	public function setUserId($userID) {
		$this->userID = $userID;
	}
    
    public function getContactId() {
		return $this->contactID;
	}

	public function setContactId($contactID) {
		$this->contactID = $contactID;
	}
    
    public function getEmployeesStatus() {
		return $this->employeesStatus;
	}
        
    public function getEmployeesStructure() {
		return $this->employeesStructure;
	}
    
    public function getEmployeeID() {
		return $this->employeeID;
	}

	public function getCode() {
		return $this->code;
	}

	public function setCode($code) {
		$this->code = $code;
	}

	public function getTagNo() {
		return $this->tagNo;
	}

	public function setTagNo($tagNo) {
		$this->tagNo = $tagNo;
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
