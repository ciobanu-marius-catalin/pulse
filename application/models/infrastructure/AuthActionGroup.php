<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('AuthAction.php');
require_once('Permission.php');

/**
 * @Entity
 * @Table(name="AuthActionGroup")
 * @HasLifecycleCallbacks
 */
class AuthActionGroup extends \Antiferno\Data\DataObject 
{
    /**
	 * @OneToMany(targetEntity="Permission", mappedBy="actiongroup")
	 * @var ArrayCollection
	 */
	protected $permissions;

	/**
	 * @OneToMany(targetEntity="AuthAction", mappedBy="authActionGroup")
	 * @var ArrayCollection
	 */
	protected $authActions;

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

	public function getPermissions() {
		return $this->permissions;
	}

	public function getAuthActions() {
		return $this->authActions;
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
