<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseValidator.php');

class AddUserValidator extends \Repositories\BaseValidator
{

	public function __construct(AddUserInput $input) {

		if( !$input->getUsername() ) {
			$this->error("username", "Username field is required");
		}


		if (!$input->getStartDate())
		{
			$this->error("startDate", "Start Date field is required");
		}

		if( !$input->getPassword() ) {
			$this->error("password", "Password field is required");
		}

		if( !$input->getConfirmPassword() ) {
			$this->error("confirmPassword", "Confirm password field is required");
		}

		if( !$input->getGivenName() ) {
			$this->error("givenName", "Given name field is required");
		}
		if( !$input->getFamilyName() ) {
			$this->error("familyName", "Family name field is required");
		}
		if( !$input->getEmail() ) {
			$this->error("email", "Email field is required");
		}

		if (!$input->getRoles())
		{
			$this->error("roles", "Roles field is required");
		}

		if( strcmp($input->getPassword(), $input->getConfirmPassword()) ) {
			$this->error("wrongPassword", "The password and its confirm are not the same");
		}
	}

}
