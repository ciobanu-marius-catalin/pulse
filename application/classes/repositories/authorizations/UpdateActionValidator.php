<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseValidator.php');

class UpdateActionValidator extends \Repositories\BaseValidator
{

	public function __construct(UpdateActionInput $input) {


		if( !$input->getActionId() ) {
			$this->error("actionId", "Resource id is required");
		}

		if( !$input->getResourceName() ) {
			$this->error("resourceName", "Resource field is required");
		}
		if( !$input->getActionName() ) {
			$this->error("actionName", "Action field is required");
		}
		
		//îmi trebuiesc toate datele
		if( !$input->getActionId() || !$input->getResourceName() || !$input->getActionName())
			return ;

		$authorizations = new \Pulse\Data\AuthorizationsRepository();
		$actionFilter = new \Pulse\Data\ActionFilter();
		$actionFilter->setId($input->getActionId());

		$action = $authorizations->getAction($actionFilter);

		if( !$action ) {
			$this->error('actionName', 'No action name was found with the given id');
		}
		$actionFilter->setId(null);
		$actionFilter->setActionName($input->getActionName());
		$actionFilter->setGroupName($input->getResourceName());
		$action = $authorizations->getAction($actionFilter);

		if( $action && $action->getId() != $input->getActionId() ) {
			$this->error('actionName', 'The action name is taken');
		}
	}

}
