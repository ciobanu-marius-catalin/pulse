<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseSyncController.php');

class Error extends PulseSyncController
{

	public function __construct() {
		parent::__construct();
	}
	public function pageNotFound() {
		$this->output->set_status_header('404');
		$this->parse->view('errors/pageNotFound.tpl');
	}
	public function accessDenied() {
		$this->output->set_status_header('403');
		$this->parse->view('errors/accessDenied.tpl');
	}

}
