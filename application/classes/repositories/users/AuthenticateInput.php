<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseInput.php');

class AuthenticateInput extends \Repositories\BaseInput
{

	protected $username;
	protected $password;
	protected $redirect;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getRedirect() {
		return $this->redirect;
	}

}
