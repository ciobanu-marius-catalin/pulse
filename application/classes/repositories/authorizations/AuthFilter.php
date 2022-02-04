<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

class AuthFilter extends \Repositories\BaseFilter
{

	protected $actionName;
	protected $groupName;
	protected $userId;
	protected $roleId;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getActionName() {
		return $this->actionName;
	}

	public function setActionName($actionName) {
		$this->actionName = $actionName;
	}

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}

	public function getRoleId() {
		return $this->roleId;
	}

	public function setRoleId($roleId) {
		$this->roleId = $roleId;
	}

	public function getGroupName() {
		return $this->groupName;
	}

	public function setGroupName($groupName) {
		$this->groupName = $groupName;
	}

}
