<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseSyncController.php');

class Knockout extends PulseSyncController
{

	public function __construct() {
		parent::__construct();
	}
	public function index(){
		$this->parse->view('knockout.tpl');
	}
}