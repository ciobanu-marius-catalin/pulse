<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseInput.php');

class AddUserInput extends \Repositories\BaseInput{
        
    /**
	 * @Column(type="datetime", name="StartDate")
	 * @var \DateTime
	 */
	protected $startDate;
	protected $username;
	protected $password;
	protected $confirmPassword;

	protected $givenName;
	protected $familyName;
	protected $email;
	protected $roles;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getUsername() {
		return $this->username;
	}
	
    /**
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}
    
	public function getPassword() {

		return $this->password;
	}

	public function getConfirmPassword() {
		return $this->confirmPassword;
	}

	public function getGivenName() {
		return $this->givenName;
	}

	public function getFamilyName() {
		return $this->familyName;
	}

	public function getEmail() {
		return $this->email;
	}

	public function getRoles() {
		return $this->roles;
	}

}
