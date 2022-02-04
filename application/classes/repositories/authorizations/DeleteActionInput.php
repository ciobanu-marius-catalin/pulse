<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes\repositories\BaseInput.php');

class DeleteActionInput extends \Repositories\BaseInput
{

	protected $actionId;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getActionId() {
		return $this->actionId;
	}

	public function setActionId($actionId) {
		$this->actionId = $actionId;
	}

}
