<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'libraries/PulseSyncController.php');


/**
 * @Authenticated
 */
class Authorizations extends PulseSyncController
{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @Permission('authorizations', 'view')
	 */
	public function index() {
		
		//$this->parse->assign('addRights',$this->hasPermissions('async/authorizations','addAction'));
		$this->parse->view('authorizations\authorizations.tpl');
	}

}
