<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

use Repositories\BaseFilter as BaseFilter;

class UserActivityFilter extends BaseFilter
{

	protected $id;
	protected $userId;
	protected $username;
	protected $loginDate;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getLoginDate() {
		return $this->loginDate;
	}

	public function setLoginDate($loginDate) {
		$this->loginDate = $loginDate;
	}

}
