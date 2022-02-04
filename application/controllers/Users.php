<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseSyncController.php');


/**
 * @Authenticated
 */
class Users extends PulseSyncController {
	
	protected $user;

	public function __construct() {
		parent::__construct();
		
		$this->user = new Pulse\Data\UsersRepository();
	}
	/**
	 * @Permission('users', 'view')
	 */
	public function index() {
		
		$filter = new Pulse\Data\UserFilter($this);
		$data = $this->user->getUsers($filter);
		
		$userSelector = $this->user->getUserStatus($filter);		
		
		$userSelector[0] = ['Toti'];
		$userSelector[1] = ['Activi','selected'];
		$userSelector[2] = ['Suspendati'];
		
		$this->parse->assign('userSelector', json_encode($userSelector));		
		$this->parse->view('users\users.tpl');
	}
	
}
