<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once(APPPATH . 'models/Employee.php');
require_once('Contact.php');
require_once('UserStatus.php');
require_once('UserActivity.php');
require_once('Permission.php');

/**
 * @Entity
 * @Table(name="User")
 * @HasLifecycleCallbacks
 */
class User extends \Antiferno\Data\DataObject
{    
    /**
	 * @ManyToOne(targetEntity="Contact")
	 * @JoinColumn(name="ContactID", referencedColumnName="ID")
     * @var Contact
	 */
	protected $contact;
    
    /**
     * @OneToMany(targetEntity="UserStatus", mappedBy="user")
     */
    protected $userStatus;
    
    /**
     * @OneToMany(targetEntity="UserActivity", mappedBy="user")
     */
    protected $userActivities;
    
    /**
     * @OneToMany(targetEntity="UserRole", mappedBy="user")
     */
    protected $userRoles;
    
    /**
     * @OneToMany(targetEntity="Permission", mappedBy="user")
     */
    protected $permissions;
    
    /**
     * @OneToMany(targetEntity="Employee", mappedBy="user")
     */
    protected $employees;     
 
    /**
	 * @Column(type="integer", name="ContactID")
	 * @var int
	 */
	protected $contactId;
    
	/** @Column(type="string", name="Username") */
	protected $username;

	/** @Column(type="string", name="Password") */
	protected $password;
    
    public function getContact() {
		return $this->contact;
	}
    
	public function setContact($contact) {
		$this->contact=$contact;
	}
	
    public function getUserStatus() {
		return $this->userStatus;
	}
    
    public function getUserActivities() {
		return $this->userActivities;
	}
        
    public function getUserRoles() {
		return $this->userRoles;
	}
	
	public function setUserRoles($userRoles) {
		$this->userRoles=$userRoles;
	}
    
    public function getPermissions() {
		return $this->permissions;
	}
    
    public function getEmployees() {
		return $this->employees;
	}
    
	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function getContactId() {
		return $this->contactId;
	}

	public function setContactId($contactId) {
		$this->contactId = $contactId;
	}

}
