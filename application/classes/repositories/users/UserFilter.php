<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

use Repositories\BaseFilter as BaseFilter;

class UserFilter extends BaseFilter
{

	protected $id;
	protected $username;
	protected $contactId;
	protected $familyName;
	protected $givenName;
	protected $email;
	protected $status;
	protected $searchUsername;
	protected $searchFamilyName;
	protected $searchGivenName;
	protected $searchEmail;


	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getContactId() {
		$this->contactId;
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

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}
	
	public function getSearchUsername(){
		return $this->searchUsername;
	}

	public function setSearchUsername($searchUsername) {
		$this->searchUsername = $searchUsername;
	}

	public function getSearchFamilyName() {
		return $this->searchFamilyName;
	}

	public function setSearchFamilyName($searchFamilyName) {
		$this->searchFamilyName = $searchFamilyName;
	}
	
	public function getSearchGivenName() {
		return $this->searchGivenName;
	}
	
	public function setSearchGivenName($searchGivenName) {
		$this->searchGivenName = $searchGivenName;
	}
	
	public function getSearchEmail() {
		return $this->searchEmail;
	}
	
	public function setSearchEmail($searchEmail){
		$this->searchEmail = $searchEmail;
	}
}
