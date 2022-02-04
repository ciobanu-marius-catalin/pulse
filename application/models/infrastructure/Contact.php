<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once(APPPATH . 'models/Employee.php');
require_once('User.php');

/**
 * @Entity
 * @Table(name="Contact")
 * @HasLifecycleCallbacks
 */
class Contact extends \Antiferno\Data\DataObject
{	
    /**
	 * @OneToMany(targetEntity="User", mappedBy="contact")
	 * @var ArrayCollection
	 */
	protected $users;
	
	/**
	 * @OneToMany(targetEntity="Employee", mappedBy="contact")
	 * @var ArrayCollection
	 */
	protected $employees;
    
    /**
	 * @Column(type="string", name="FamilyName")
	 * @var string
	 */
	protected $familyName;
    
    /**
	 * @Column(type="string", name="GivenName")
	 * @var string
	 */
	protected $givenName;
    
    /**
	 * @Column(type="string", name="Email")
	 * @var string
	 */
	protected $email;
    
    /**
	 * @Column(type="string", name="Phone1")
	 * @var string
	 */
	protected $phone1;
    
    /**
	 * @Column(type="string", name="Phone2")
	 * @var string
	 */
	protected $phone2;

	/**
	 * @Column(type="text", name="Description")
	 * @var string
	 */
	protected $description;
    
    public function getUsers() {
		return $this->users;
	}
	
	public function setUsers($users) {
		$this->users = $users;
	}
    
    public function getEmployees() {
		return $this->employees;
	}
    
    public function getFamilyName() {
		return $this->familyName;
	}

	public function setFamilyName($familyName) {
		$this->familyName = $familyName;
	}
    
    public function getGivenName() {
		return $this->givenName;
	}

	public function setGivenName($givenName) {
		$this->givenName = $givenName;
	}
    
    public function getEmail() {
        return $this->email;
	}

	public function setEmail($email) {
        $this->email = $email;
	}
    
    public function getPhone1() {
		return $this->phone1;
	}

	public function setPhone1($phone1) {
		$this->phone1 = $phone1;
	}
    
    public function getPhone2() {
		return $this->phone2;
	}

	public function setPhone2($phone2) {
		$this->phone2 = $phone2;
	}
    
    public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
}
