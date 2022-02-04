<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseAsyncController.php');
require_once(APPPATH . 'classes/repositories/users/AddUserInput.php');
require_once(APPPATH . 'classes/repositories/users/AddUserValidator.php');
require_once(APPPATH . 'classes/repositories/users/DeleteUserInput.php');
require_once(APPPATH . 'classes/repositories/users/DeleteUserValidator.php');

class Users extends PulseAsyncController {
    
    protected $user;
	
	public function __construct() {
		parent::__construct();
		
		$this->user = new Pulse\Data\UsersRepository();
	}
    
	/**
	 * @Permission('users', 'view')
	 */
	public function browseUsers() {
		
		//$this->_logPost();
		$filter = new Pulse\Data\UserFilter($this);
		//$filter->setStatus(new pulse\models\UserStatus);
		$data = $this->user->getUsers($filter);
		$count = $this->user->countUsers($filter);
		$response = array (
			'page' => (int) $filter->getPage()
			, 'total' => ceil($count /$filter->getRows())
			, 'records' => $count
			, 'rows' => array()
		);
        //throw new Exception($data->getIterator()->current()->getUsername());
		foreach($data as $entry) {
			//throw new Exception('llll');
			$response['rows'][] = array(
				'id' => $entry->getId()
				, 'cell' => array (
                    $entry->getUsername() 
					,$entry->getContact()->getFamilyName()
                    ,$entry->getContact()->getGivenName()
					, $entry->getContact()->getEmail() 
					, $entry->getUserStatus()->getIterator()->current()->getStatus()
				)					
			);
		}

		$this->_success($response);
	}

	/**
	 * @Permission('users', 'view')
	 */
    public function getResource(){
	  
		$usersRepository = new Pulse\Data\UsersRepository;
		$filter = new Pulse\Data\RoleFilter($this);
			
		//$users = $usersRepository->getUsers($filter);
		$roles=$usersRepository->getRoles($filter);
	  
		$result = array();
		foreach($roles as $role){
			$result[] = array(array('id' => $role->getName()),
			array('text' => $role->getName()));
		}
        $response = array(
			'success' => true,
			'items' => $result
		);
		
	  //$this->_success($response);
		echo(json_encode($response));
  }
  
  
//	protected function addUser() {
//		$input = new \Logistics\Data\AddUserInput($this);
//		$validator = new \Logistics\Data\AddUserValidator($input);
//
//		if( $validator->hasErrors() )
//			return $this->_error('The new user was not added.', $validator->toArray());
//		
//		$response = array('success' => false);
//
//		try {
//			$usr = $this->user->addUser($input);
//			
//			$response['success'] = true;
//			$response['id'] = $usr->getId();
//		}
//		catch(Exception $exception) {
//			log_message('error', $exception->getMessage());
//			
//			$response['message'] = $exception->getMessage();
//		}
//
//		return $this->_success($response);
//	}
  
	/**
	 * @Permission('users', 'add')
	 */  
    public function addUser() {

		$input = new \Pulse\Data\AddUserInput($this);

		$validator = new \Pulse\Data\AddUserValidator($input);

		if ($validator->hasErrors()) {
			$this->_error("The new user was not added", $validator->toArray());

		} 
		else {			
			try {
				$this->user->addUser($input);
				$response = array(
					'success' => true
				);
			}
			catch(Exception $exception) {
				$response['message'] = $exception->getMessage();
				return $this->_error($response);
			}
			$this->_success($response);

			
		}
	}
	
	/**
	 * @Permission('authorizations', 'delete')
	 */
	public function deleteUser() {

		$users = new \Pulse\Data\UsersRepository();
		$input = new \Pulse\Data\DeleteUserInput($this);
		$validator = new \Pulse\Data\DeleteUserValidator($input);

		if( $validator->hasErrors() ) {
			return $this->_error('Can\'t delete the user', $validator->toArray());
		}

		$response = array('success' => false);
		try {
			$users->deleteUser($input);
			$response['success'] = true;
		}
		catch(Exception $exception) {
			$response['message'] = $exception->getMessage();
		}

		return $this->_success($response);
	}

}
