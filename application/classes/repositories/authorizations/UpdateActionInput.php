<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseInput.php');

class UpdateActionInput extends \Repositories\BaseInput
{

	protected $actionId;
	protected $actionName;
	protected $actionDescription;
	protected $resourceName;
	protected $resourceDescription;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
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

	public function getActionDescription() {
		return $this->actionDescription;
	}

	public function getResourceName() {
		return $this->resourceName;
	}

	public function getResourceDescription() {
		return $this->resourceDescription;
	}

}
