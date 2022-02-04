<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

class ActionFilter extends \Repositories\BaseFilter
{

	protected $id;
	protected $actionName;
	protected $groupName;
	protected $description;
	protected $searchActionName;
	protected $searchGroupName;
	protected $searchDescription;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getActionName() {
		return $this->actionName;
	}

	public function setActionName($actionName) {
		$this->actionName = $actionName;
	}

	public function getGroupName() {
		return $this->groupName;
	}

	public function setGroupName($groupName) {
		$this->groupName = $groupName;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getSearchActionName() {
		return $this->searchActionName;
	}

	public function setSearchActionName($searchActionName) {
		$this->searchActionName = $searchActionName;
	}	
	
	public function getSearchGroupName() {
		return $this->searchGroupName;
	}
	
	public function setSearchGroupName($searchGroupName){
		$this->searchGroupName = $searchGroupName;
	}
	
	public function getSearchDescription() {
		return $this->searchDescription;
	}
	
	public function setSearchDescription($searchDescription) {
		$this->searchDescription = $searchDescription;
	}

}
