<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseValidator.php');
require_once('AuthorizationsRepository.php');

class DeleteActionValidator extends \Repositories\BaseValidator
{

	public function __construct(DeleteActionInput $input) {
		$actions = new AuthorizationsRepository();
		if( !$input->getactionId() )
			$this->error('actionId', 'The action id is required');
		else {
			$action = $actions->getAction($input->getActionId());

			if( !$action )
				$this->error('actionId', 'No action was found with the given id.');
		}
	}

}
