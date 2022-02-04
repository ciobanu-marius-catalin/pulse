<?php

require_once(APPPATH . 'libraries/PulseSyncController.php');
require_once(APPPATH . 'classes/repositories/users/UsersRepository.php');
require_once(APPPATH . 'classes/repositories/users/AuthenticateValidator.php');

class Authenticate extends PulseSyncController
{

	protected $users;

	public function __construct() {

		parent::__construct();

		$this->users = new Pulse\Data\UsersRepository();
	}

	function index($redirect = null) {
		if( $this->session->userdata('user_id') )
			redirect('');

		$redirect = $this->session->flashdata('redirect');

		$this->parse->assign('redirect', $redirect);
		$this->parse->view('authenticate/index.tpl');
	}

	public function auth() {
		if( $this->session->userdata('user_id') )
			redirect('');

		$input = new \Pulse\Data\AuthenticateInput($this);
		$validator = new \Pulse\Data\AuthenticateValidator($input);

		if( $validator->hasErrors() ) {
			$this->parse->assign('redirect', $input->getRedirect());
			$this->parse->assign('messages', json_encode($validator->toArray()));
			$this->parse->view('authenticate/index.tpl');
		}
		else {
			try {
				$redirect = $this->users->authenticate($input);
				redirect($redirect);
			}
			catch(Exception $exception) {

				$this->parse->assign('redirect', $input->getRedirect());
				$this->parse->assign('messages', json_encode(array('message' => 'Eroare server.')));
				$this->parse->view('authenticate/index.tpl');
			}
		}
	}

	public function logout() {

		$this->session->unset_userdata('user_id');

		redirect('authenticate/index');
	}

}
