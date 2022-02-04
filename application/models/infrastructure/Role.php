<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('UserRole.php');
require_once('Permission.php');

/**
 * @Entity
 * @Table(name="Role")
 * @HasLifecycleCallbacks
 */
class Role extends \Antiferno\Data\DataObject
{
    /**
	 * @OneToMany(targetEntity="UserRole", mappedBy="role")
	 * @var ArrayCollection
	 */
	protected $userRoles;
	
	/**
	 * @OneToMany(targetEntity="Permission", mappedBy="role")
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
    
    public function getUserRoles() {
		return $this->userRoles;
	}
	
	public function getPermissions() {
		return $this->permissions;
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
