<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseValidator.php');
require_once('UsersRepository.php');

class DeleteUserValidator extends \Repositories\BaseValidator
{

	public function __construct(DeleteUserInput $input) {
		$users = new UsersRepository();
		if( !$input->getUserId() )
			$this->error('userId', 'The user id is required');
		else {
			$user = $users->getUser($input->getUserId());
			

			if( !$user )
				$this->error('userId', 'No user was found with the given id.');
			$time = new \DateTime('now');
			//echo $time->format('m-d-Y H:i:s');
			//$usr=$user->getUserStatus($input->getStartDate());
			//echo $usr->format('m-d-Y H:i:s');
			if($user->getUserStatus($input->getStartDate())->getStartDate < $time)	
				
				$this->error('startDate', 'Utilizatorul este deja creat.');
			
		}
	}

}
