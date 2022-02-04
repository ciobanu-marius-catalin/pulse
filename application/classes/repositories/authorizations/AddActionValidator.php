<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseValidator.php');

class AddActionValidator extends \Repositories\BaseValidator
{

	public function __construct(AddActionInput $input) {

		if( !$input->getResourceName() ) {
			$this->error('resourceName', 'Resource field is required');
		}
		if( !$input->getActionName() ) {
			$this->error('actionName', 'Action field is required');
		}
		
		//trebuie să am ambele date ca să pot verifica unicitatea numelui acțiunii
		if( !$input->getResourceName() || !$input->getResourceName()) 
			return;
		
		$authorizations = new \Pulse\Data\AuthorizationsRepository();
		$actionFilter = new \Pulse\Data\ActionFilter();

		$actionFilter->setActionName($input->getActionName());
		$actionFilter->setGroupName($input->getResourceName());
		$action = $authorizations->getAction($actionFilter);

		if( $action ) {
			$this->error('actionName', 'The action name is taken');
		}
	}

}
