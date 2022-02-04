<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('AuthActionGroup.php');
require_once('Permission.php');

/**
 * @Entity
 * @Table(name="AuthAction")
 * @HasLifecycleCallbacks
 */
class AuthAction extends \Antiferno\Data\DataObject
{
	/**
	 * @ManyToOne(targetEntity="AuthActionGroup")
	 * @JoinColumn(name="ActionGroupID",referencedColumnName="ID")
	 * @var AuthActionGroup
	 */
	protected $authActionGroup;
    
	/**
	 * @Column(type="integer", name="ActionGroupID")
	 */
	protected $actionGroupId;
	
    /**
	 * @OneToMany(targetEntity="Permission", mappedBy="action")
	 * @var ArrayCollection
	 */
	protected $permissions;

	/**
	 * @Column(type="string", name="Name")
	 * @var string
	 */
	protected $name;

	/**
	 * @Column(type="text", name="Description")
	 * @var string
	 */
	protected $description;
	
	public function getActionGroupID(){
		return $this->actionGroupId;
	}
	public function setActionGroupID($actionGroupId){
		$this->actionGroupId = $actionGroupId;
	}
	
	public function getAuthActionGroup() {
		return $this->authActionGroup;
	}
	
	public function setAuthActionGroup($authActionGroup){
		$this->authActionGroup = $authActionGroup;
	}
		
	public function getPermission() {
		return $this->permission;
	}
	
	public function setPermission($permission){
		$this->permission = $permission;
	}
	
	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
	
	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
}