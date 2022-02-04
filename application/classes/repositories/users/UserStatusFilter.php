<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

use Repositories\BaseFilter as BaseFilter;

class UserStatusFilter extends BaseFilter
{

	const ACTIVE_USER = 1;
	const SUSPENDED_USER = 2;

	protected $id;
	protected $userId;
	protected $username;
	protected $status;	
	/**
	 * @Column(type="datetime", name="StartDate")
	 * @var \DateTime
	 */
	public $startDate;

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

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}
//
//	public function setStartDate(\DateTime $startDate) {
//		return $this->startDate = $startDate;
//	}

}
