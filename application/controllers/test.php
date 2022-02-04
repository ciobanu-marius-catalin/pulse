<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseSyncController.php');
//require_once(APPPATH . 'classes/repositories/structures/StructuresRepository.php');
//require_once(APPPATH . 'classes/repositories/structures/StructureFilter.php');

require_once(APPPATH . 'classes/repositories/employees/EmployeesRepository.php');
require_once(APPPATH . 'classes/repositories/employees/EmployeeFilter.php');


class Test extends PulseSyncController {

	protected $ci;
	
	public function __construct() {
		parent::__construct();
		$this->ci = & get_instance();
	}

    public function test() {
       
        $CI = & get_instance();
        $employee = new Pulse\Data\Employees();
        $filter = new Pulse\Data\EmployeeFilter();        
////         
        $filter->setUserId(1);
        $redirect = $employee->getEmployee($filter);
        $this->parse->assign('action', $redirect->getUserId());
//       
        $filter->setContactId(1);
        $redirect = $employee->getEmployee($filter);
        $this->parse->assign('action', $redirect->getContactId());
//        
        $filter->setFamilyName('cosa');
        $redirect = $employee->getEmployee($filter);
        $this->parse->assign('action', $redirect->getContact()->getFamilyName());
        $this->parse->view('test.tpl');
////            
//        $filter->setGivenName('Ancuta');
//        $redirect = $employee->getEmployee($filter);
//        $this->parse->assign('action', $redirect->getContact()->getGivenName());
////        $this->parse->view('test.tpl');
//////        
//        $filter->setEmail('andreea.cosa@gmail.com');
//        $redirect = $employee->getEmployee($filter);
//        $this->parse->assign('action', $redirect->getContact()->getEmail());
////        //$this->parse->view('users.tpl');
////         
//        $filter->setCode('2010295402561');
//        $redirect = $employee->getEmployee($filter);
//        $this->parse->assign('action', $redirect->getCode());
////        //$this->parse->view('test.tpl');
////        
//        $filter->setTagNo('sqwerty');
//        $redirect = $employee->getEmployee($filter);
//        $this->parse->assign('action', $redirect->getTagNo());
        
        //$this->parse->view('test.tpl');
        //$this->parse->view('users/users.tpl');
        //$this->parse->view('authorizations/authorizations.tpl');
//        
//        $CI = & get_instance();
//        $structure = new Pulse\Data\Structures();
//        $filter = new Pulse\Data\StructureFilter();
//        
////        $filter->setUsername('1');
////		$response = $user->getUser($filter);
////		return $response->getId();
//        
//        $filter->setId(1);
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getId());  
//       
//      $filter->setDetailId(1);
//        $redirect = $structure->getStructure($filter);
//       $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getid());
//        
//        //Nu stiiiuuu
        //$filter->setDetailId(1);
        //$redirect = $structure->getStructure($filter);
        //$this->parse->assign('action', $redirect->getStructureDetail()->getDetailId());
        
//        $filter->setParentId('5');
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getParentId());
//                
//        $filter->setDetailName('nume1');
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getName());
//        
//        
//        $filter->setCode('var1');
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getCode());
//        //$this->parse->view('test.tpl');
//        
//        $filter->setLeft(4);
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getLeft());
//        
//        $filter->setRight(6);
//        $redirect = $structure->getStructure($filter);
//        $this->parse->assign('action', $redirect->getDetails()->getIterator()->current()->getRight());
//        
        
//        $this->parse->view('test.tpl');
//        
//        $this->parse->view('test.tpl');
        
        
        /*$i=1;
        foreach($redirect->getDetails() as elem){
            elem->getParentId();            
        }
        */
        
        
        
        /*
        $filter->setDetailId(2);
        $redirect = $structure->getDetailId($filter);
        $this->parse->assign('action', $redirect->getStructureDetail()->getId());
        
        $this->parse->view('test.tpl');
        
        /*if( $validator->hasErrors() ){
            $this->parse->assign('redirect', json_encode($validator->toArray()));

	public function test() {
		$CI = & get_instance();
		$user = new Pulse\Data\UsersRepository();
		$input = new Pulse\Data\AuthenticateInput($CI);
		//$validator = new Pulse\Data\AuthenticateValidator($input);
		$filter = new Pulse\Data\UsersRepositoryFilter();
		/*if( $validator->hasErrors() ){
			$this->parse->assign('redirect', json_encode($validator->toArray()));

	public function testUsers() {
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserFilter();

		$filter->setUsername('1');
		$response = $user->getUser($filter);
		return $response->getId();
		//$response = $user->getUsers($filter);
		//return $response->getIterator()->current()->getId();
	}

	public function testAuthenticate() {
		$user = new Pulse\Data\UsersRepository();
		
		$input = new Pulse\Data\AuthenticateInput($this->ci);
		$validator = new Pulse\Data\AuthenticateValidator($input);
		if( $validator->hasErrors() ){
			$response = json_encode($validator->toArray());
		} 
		else $response = $user->authenticate($input);		
		
		return $response;
	}
	
	public function testUserRoles() {
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserRoleFilter();
		$filter->setUserId(1);
		$filter->setRoleId(1);

		//$response = $user->getUserRole($filter);
		//return $response->getId();

		$response = $user->getUserRoles($filter);
		//throw new \Exception($response);
		return $response->getIterator()->current()->getId();
	}

	public function testRoles() {
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\RoleFilter();
		
		$filter->setId(1);
		$filter->setName(1);
		
		$response = $user->getRole($filter);
		return $response->getId();

		//$response = $user->getRoles($filter);
		//return $response->getIterator()->current()->getId();
	}

	public function testUserStatus(){
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserFilter();
		
		//$filter->setUserId(1);
		//$filter->setStatus(1);
		
				
		//$response = $user->getUserStatus($filter);
		//return $response->getId();

		$response = $user->getUserStatuses($filter);
		return $response->getIterator()->current()->getId();
	}
	
	public function testUserActivity(){
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserFilter();
		
		$filter->setUserId(1);
		
		
		//$response = $user->getUserActivity($filter);
		//return $response->getId();

		$response = $user->getUserActivities($filter);
		return $response->getIterator()->current()->getId();		
	}
	
	public function test() {		
		
		//$response = $this->testUsers();
		//$response = $this->testAuthenticate();
		//$response = $this->testUserRoles(); 
		//$response = $this->testRoles();
		//$response = $this->testUserStatus();
		//$response = $this->testUserActivity();		
		$this->parse->assign('action', 'ID-UL ESTE :' . $response);		
		//$user = new Pulse\Data\UsersRepository();
		//$input = new Pulse\Data\AuthenticateInput($CI);
		//$validator = new Pulse\Data\AuthenticateValidator($input);
		//$filter = new Pulse\Data\UsersRepositoryFilter();
		/*if( $validator->hasErrors() ){
			$this->parse->assign('redirect', json_encode($validator->toArray()));

        }else {
        $redirect = $user->authenticate($input);
        
        $filter->setCode('2');
        $redirect = $user->getCode($filter);
        $this->parse->assign('action', $redirect);
        }
        
        /*
        $filter->setUsername('1');
        $rezultat = $user->getUser($filter);
        $rezultat = $user->getUsers($filter)->getIterator()->current();
        $this->parse->assign('action', $rezultat->getUserName());
        /*
          $filter = new Pulse\Data\RoleFilter();
          $filter->setUserId(1);
          //$filter->setRoleId(1);
          $redirect = $user->getUserRoles($filter)->getIterator();
          $redirect->next();
          $this->parse->assign('redirect', $redirect->current()->getRole()->getDescription());
         */
		// $this->parse->assign('redirect', $redirect->getPassword());
		// $this->parse->assign('redirect', $redirect->getIterator()->current()->getPassword());
		// $user = new Pulse\Data\Authorizations();
		  //$filter = new Pulse\Data\AuthorizationFilter();
		  //$filter->setGroup('2');
		  //$rezultat = $user->getGroups($filter)->getIterator();
		   //$rezultat = $user->getGroup($filter);;
		  // $rezultat = $user->getActions($filter)->getIterator();
		   //$rezultat = $user->getAction($filter);;
		  //$rezultat->next();
		  //$rezultat = $rezultat->current();
		 //$this->parse->assign('action', 'ID-UL ESTE :' . $rezultat->getId());
		 // $this->parse->assign('action', 'ID-UL ESTE :' . $rezultat->current()->getId());
		// $this->parse->assign('redirect', $redirect->getPassword());
		// $this->parse->assign('redirect', $redirect->getIterator()->current()->getPassword());
		// $user = new Pulse\Data\AuthorizationsRepository();
		//  $filter = new Pulse\Data\AuthorizationFilter();
		// $filter->setGroupName('1');
		 //$filter->setGroupId(3);
		 //$filter->setActionId(7);
		 //$filter->setActionName('5');
		  //$rezultat = $user->getGroups($filter)->getIterator();
			//$rezultat = $user->getGroup($filter);;
		  // $rezultat = $user->getActions($filter)->getIterator();
		   //$rezultat = $user->getAction($filter);;
		  //$rezultat->next();
		  //$rezultat = $rezultat->current();
		// $this->parse->assign('action', 'ID-UL ESTE :' , $rezultat);
		  //$this->parse->assign('action', 'ID-UL ESTE :' . $rezultat->current()->getId());

		//$this->parse->assign('titlu', 'Merge smarty');

		//$this->parse->assign('titlu', 'Merge smarty');



        // $this->parse->assign('redirect', $redirect->getPassword());
        // $this->parse->assign('redirect', $redirect->getIterator()->current()->getPassword());
        // $user = new Pulse\Data\AuthorizationsRepository();
        //  $filter = new Pulse\Data\AuthorizationFilter();
         // $filter->setContactId('1');
          //$rezultat = $employee->getContactId($filter);
           //$rezultat = $user->getGroup($filter);;
    //       $rezultat = $user->getActions($filter)->getIterator();
           //$rezultat = $user->getAction($filter);;
          //$rezultat->next();
          //$rezultat = $rezultat->current();
        // $this->parse->assign('action', 'ID-UL ESTE :' . $rezultat->getContactId());
    //      $this->parse->assign('action', 'ID-UL ESTE :' . $rezultat->current()->getId());

        //$this->parse->assign('titlu', 'Merge smarty');


       // $this->parse->view('test.tpl');
    }
}