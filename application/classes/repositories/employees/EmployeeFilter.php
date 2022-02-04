<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');
require_once(APPPATH . 'models/Employee.php');
require_once(APPPATH . 'models/infrastructure/Contact.php');

use Repositories\BaseFilter as BaseFilter;

class EmployeeFilter extends BaseFilter
{

	protected $userId;
	protected $contactId;
	protected $familyName;
	protected $givenName;
	protected $email;
	protected $code;
	protected $tagNo;
	protected $position;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}

	public function getContactId() {
		return $this->contactId;
	}

	public function setContactId($contactId) {
		$this->contactId = $contactId;
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

	public function getCode() {
		return $this->code;
	}

	public function setCode($code) {
		$this->code = $code;
	}

	public function getTagNo() {
		return $this->tagNo;
	}

	public function setTagNo($tagNo) {
		$this->tagNo = $tagNo;
	}

	public function getPosition() {
		return $this->position;
	}

	public function setPosition($position) {
		$this->position = $position;
	}

}
