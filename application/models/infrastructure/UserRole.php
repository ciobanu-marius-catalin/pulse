<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('User.php');
require_once('Role.php');

/**
 * @Entity
 * @Table(name="UserRole")
 * @HasLifecycleCallbacks
 */
class UserRole extends \Antiferno\Data\DataObject
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
	 * @ManyToOne(targetEntity="Role")
	 * @JoinColumn(name="RoleID", referencedColumnName="ID")
	 * @var Role
	 */
	protected $role;

	/**
	 * @Column(type="integer", name="RoleID")
	 * @var int
	 */
	protected $roleId;
	
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

	public function getUser() {
		return $this->user;
	}
	
	public function setUser($user){
		$this->user = $user;
	}

	public function getRole() {
		return $this->role;
	}
	
	public function setRole($role){
		$this->role = $role;
	}
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
	
	public function getRoleId(){
		return $this->roleId;
	}
	
	public function setRoleId($roleId){
		$this->roleId = $roleId;
	}
    
	/**
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	public function setStartDate(\DateTime $startDate) {
		$this->startDate = $startDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	public function setEndDate(\DateTime $endDate) {
		$this->endDate = $endDate;
	}
}
