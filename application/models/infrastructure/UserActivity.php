<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('User.php');

/**
 * @Entity
 * @Table(name="UserActivity")
 * @HasLifecycleCallbacks
 */
class UserActivity extends \Antiferno\Data\DataObject
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
	 * @Column(type="datetime", name="LoginDate")
	 * @var \DateTime
	 */
	protected $loginDate;
	
	public function getUser() {
		return $this->user;
	}

	/**
	 * @return \DateTime
	 */
	public function getLoginDate() {
		return $this->loginDate;
	}

	public function setLoginDate(\DateTime $loginDate) {
		return $this->loginDate = $loginDate;
	}
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
}
