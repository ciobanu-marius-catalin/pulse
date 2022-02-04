<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

use Repositories\BaseFilter as BaseFilter;

class UserRoleFilter extends BaseFilter
{

	protected $id;
	protected $userId;
	protected $username;
	protected $roleId;
	protected $roleName;

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

	public function getRoleId() {
		return $this->roleId;
	}

	public function setRoleId($roleId) {
		$this->roleId = $roleId;
	}

	public function getRoleName() {
		return $this->roleName;
	}

	public function setRoleName($roleName) {
		$this->roleName = $roleName;
	}

}
