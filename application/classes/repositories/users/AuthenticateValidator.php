<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/crypt/PasswordHash.php');

require_once(APPPATH . 'classes/repositories/BaseValidator.php');
require_once(APPPATH . 'classes/repositories/users/UsersRepository.php');
require_once('AuthenticateInput.php');

class AuthenticateValidator extends \Repositories\BaseValidator
{

	public function __construct(AuthenticateInput $input) {

		$users = new UsersRepository();

		if( !$input->getUsername() )
			$this->error('username', 'The username is required.');

		if( !$input->getPassword() )
			$this->error('password', 'The password is required.');

		if( !$input->getUsername() || !$input->getPassword() )
			return;

		$filter = new UserFilter();
		$filter->setUsername($input->getUsername());
		$user = $users->getUser($filter);

		if( !$user )
			$this->error('username', 'Invalid username.');


		$hasher = new \PasswordHash(8, false);
		//throw new \Exception($hasher->HashPassword($input->getPassword()));
		$authenticated = $user != null && $hasher->CheckPassword($input->getPassword(), $user->getPassword());

		if( !$authenticated )
			$this->error('password', 'Wrong password.');
	}

}
