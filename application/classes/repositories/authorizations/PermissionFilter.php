<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

class PermissionFilter extends \Repositories\BaseFilter
{

	protected $id;
	protected $actionId;
	protected $actionName;
	protected $groupId;
	protected $groupName;
	protected $userId;
	protected $username;
	protected $roleId;
	protected $roleName;
	protected $access;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getActionId() {
		return $this->actionId;
	}

	public function setActionId($actionId) {
		$this->actionId = $actionId;
	}

	public function getActionName() {
		return $this->actionName;
	}

	public function setActionName($actionName) {
		$this->actionName = $actionName;
	}

	public function getGroupId() {
		return $this->groupId;
	}

	public function setGroupId($groupId) {
		$this->groupId = $groupId;
	}

	public function getGroupName() {
		return $this->groupName;
	}

	public function setGroupName($groupName) {
		$this->groupName = $groupName;
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

	public function setUserName($username) {
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

	public function getAccess() {
		return $this->access;
	}

	public function setAccess($access) {
		$this->access = $access;
	}

}
