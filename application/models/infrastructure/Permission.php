<?php

namespace pulse\models;

require_once('User.php');
require_once('Role.php');
require_once('AuthActionGroup.php');
require_once('AuthAction.php');

/**
 * @Entity
 * @Table(name="Permission")
 * @HasLifecycleCallbacks
 */
class Permission extends \Antiferno\Data\DataObject
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
	 * @ManyToOne(targetEntity="AuthActionGroup")
	 * @JoinColumn(name="AuthGroupID", referencedColumnName="ID")
	 * @var AuthActionGroup
	 */
	protected $group;
        
	/**
	 * @Column(type="integer", name="AuthGroupID")
	 * @var type 
	 */
	protected $groupId;

	/**
	 * @ManyToOne(targetEntity="AuthAction")
	 * @JoinColumn(name="AuthActionID", referencedColumnName="ID")
	 * @var AuthAction 
	 */
	protected $action;
    
	/**
	 * @Column(type="integer", name="AuthActionID")
	 * @var int
	 */
	protected $actionId;
    
    /**
	 * @Column(type="integer", name="Access")
	 */
	protected $access;

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
	
	public function getAccess() {
		return $this->access != 0; // access: 1 - interzis, 0 - acordat
	}
		
	public function getUser() {
		return $this->user;
	}

	public function getRole() {
		return $this->role;
	}
	
	public function getGroup() {
		return $this->group;
	}
		
	public function getAction() {
		return $this->action;
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
	
	public function getActionId(){
		return $this->actionId;
	}
	
	public function setActionId($actionId){
		$this->actionId = $actionId;
	}
	
	public function getGroupId(){
		return $this->groupId;
	}
	
	public function setGroupId($groupId){
		$this->groupId = $groupId;
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

	public function setEndDate(\DateTime $endDate = null) {
		$this->endDate = $endDate;
	}
}
