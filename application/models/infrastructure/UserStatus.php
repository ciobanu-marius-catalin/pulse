<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('User.php');

/**
 * @Entity
 * @Table(name="UserStatus")
 * @HasLifecycleCallbacks
 */
class UserStatus extends \Antiferno\Data\DataObject
{
	/**
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="UserID", referencedColumnName="ID")
     * @var User
    */
	protected $user;
    
    /**
	 * @Column(type="integer", name="UserID")
	 * @var int
	 */
	protected $userId;
    
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
    
    /**
	 * @Column(type="integer", name="Status")
	 * @var int
	 */
	protected $status;
	
	
	public function getUser() {
		return $this->user;
	}

    /**
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	public function setStartDate(\DateTime $startDate) {
		return $this->startDate = $startDate;
	}
    
    /**
	 * @return \DateTime
	 */
    public function getEndDate() {
		return $this->endDate;
	}

	public function setEndDate(\DateTime $endDate) {
		return $this->endDate = $endDate;
	}
    
    public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
	
}
