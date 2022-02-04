<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'libraries/PulseSyncController.php');


/**
 * @Authenticated
 */
class Employees extends PulseSyncController
{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @Permission('employees', 'view')
	 */
	public function index() {
		$this->parse->view('employees/employees.tpl');
	}

}
