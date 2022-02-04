<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'libraries/PulseSyncController.php');
require_once(APPPATH . 'classes/repositories/users/UsersRepository.php');
require_once(APPPATH . 'classes/repositories/users/AuthenticateInput.php');
require_once(APPPATH . 'classes/repositories/users/AuthenticateValidator.php');
require_once(APPPATH . 'classes/repositories/users/UserFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/AuthorizationsRepository.php');
require_once(APPPATH . 'classes/repositories/users/RoleFilter.php');
require_once(APPPATH . 'classes/repositories/users/UserRoleFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/Auth.php');
require_once(APPPATH . 'classes/repositories/authorizations/AuthFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/ActionFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/GroupFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/PermissionFilter.php');

class Test2 extends PulseSyncController
{

	protected $ci;

	public function __construct()
	{
		parent::__construct();
		$this->ci = & get_instance();
	}

	public function testActions()
	{
		$actions = new \Pulse\Data\AuthorizationsRepository();
		$filter = new \Pulse\Data\ActionFilter();

		/* $filter->setId(1);
		  $filter->setActionName('1');
		  $filter->setGroupName('1');
		  $filter->setDescription('1');
		 */

		//$filter->sort('actionName','asc');
		$filter->sort('groupName', 'asc');
		//$filter->sort('description', 'asc');

		$response = $actions->getActions($filter);

		$responseArray[] = array();
		foreach ($response as $resp)
		{
			$responseArray[] = array(
				array('id', $resp->getId()),
				array('actionName', $resp->getName()),
				array('groupName', $resp->getAuthActionGroup()->getName()),
				array('description', $resp->getDescription())
			);
		}
		return json_encode($responseArray);
	}

	public function testGroups()
	{
		$actions = new \Pulse\Data\AuthorizationsRepository();
		$filter = new \Pulse\Data\GroupFilter();

		//$filter->setId(1);
		//$filter->setActionName('1');
		//$filter->setGroupName('1');
		//$filter->setDescription('1');
		//$filter->sort('actionName','asc');
		//$filter->sort('groupName', 'asc');
		$filter->sort('description', 'asc');

		$response = $actions->getGroups($filter);

		$responseArray[] = array();
		foreach ($response as $resp)
		{
			$actionName = $resp->getAuthActions()->getIterator()->current();
			$responseArray[] = array(
				array('id', $resp->getId()),
				array('actionName', isset($actionName) ? $actionName->getName() : 'null'),
				array('groupName', $resp->getName()),
				array('description', $resp->getDescription())
			);
		}
		return json_encode($responseArray);
	}

	public function testAuth()
	{
		$auth = new \Pulse\Data\Auth();
		$filter = new \Pulse\Data\AuthFilter();

		$filter->setActionName('1');
		$filter->setGroupName('1');
		$filter->setUserId(1);
		$filter->setRoleId(1);

		$response = $auth->isAuthorized($filter);
		return ($response) ? 'true' : 'false';
	}

	public function testUsers()
	{
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserFilter();

		//$filter->setUsername('2');
		$filter->setContactId(1);
		$filter->setFamilyName('Fname');
		$filter->setGivenName('Gname');
		$filter->setEmail('1231@yahoo.com');
		//$filter->sort('username','desc');
		
		//$response = $user->getUser($filter);
		//$response = $user->getUser(1);
		//return $response->getId();
        $response = $user->getUsers($filter);
		return $response->getIterator()->current()->getContact()->getFamilyName();
	}

	public function testAuthenticate()
	{
		$user = new Pulse\Data\UsersRepository();

		$input = new Pulse\Data\AuthenticateInput($this->ci);
		$validator = new Pulse\Data\AuthenticateValidator($input);
		if ($validator->hasErrors())
		{
			$response = json_encode($validator->toArray());
		}
		else
			$response = $user->authenticate($input);


		return $response;
	}

	public function testUserRoles()
	{
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserRoleFilter();
		
		$filter->setId(1);
		$filter->setUserId(1);
		$filter->setUsername('1');
		$filter->setRoleId(1);
		$filter->setRoleName('1');
		
		$filter->sort('username');
		$filter->sort('roleName');

	//	$response = $user->getUserRole($filter);
		//$response = $user->getUserRole(1);
		//return $response->getId();

		$response = $user->getUserRoles($filter);
		//throw new \Exception($response);
		return $response->getIterator()->current()->getId();
	}

	public function testRoles()
	{
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\RoleFilter();

		$filter->setId(1);
		$filter->setName(1);
		$filter->setDescription('1');
		
		$filter->sort('name');
		$filter->sort('description');

		//$response = $user->getRole($filter);
		//$response = $user->getRole(1);
		//return $response->getId();

		$response = $user->getRoles($filter);
		return $response->getIterator()->current()->getId();
	}

	public function testUserStatus()
	{
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserStatusFilter();

		$filter->setId(1);
		$filter->setUserId(1);
		$filter->setStatus(1);
		$filter->setUsername('1');
		
		$filter->sort('username');
		$filter->sort('status');
		
		//$response = $user->getUserStatus($filter);
		//$response = $user->getUserStatus(2);
		//return $response->getId();

		$response = $user->getUserStatuses($filter);
		return $response->getIterator()->current()->getId();
	}

	public function testUserActivity()
	{
		$user = new Pulse\Data\UsersRepository();
		$filter = new Pulse\Data\UserActivityFilter();
/*
		$filter->setId(1);
		$filter->setUserId(1);
		$filter->setUsername('1');
		$filter->setLoginDate(new DateTime('22.07.2016 14:19:28'));
*/		
		//$filter->sort('username');
		$filter->sort('loginDate', 'desc');

		//$response = $user->getUserActivity($filter);
		//$response = $user->getUserActivity(1);
		//return $response->getId();

		$response = $user->getUserActivities($filter);
		return $response->getIterator()->current()->getId();
	}

	public function testPermissions()
	{
		$permission = new \Pulse\Data\AuthorizationsRepository();
		$filter = new \pulse\Data\PermissionFilter();

		/*
		  $filter->setUserId(1);
		  $filter->setUsername('1');
		  $filter->setRoleId(1);
		  $filter->setRoleName('1');
		  $filter->setActionId(1);
		  $filter->setActionName('1');
		  $filter->setGroupId(1);
		  $filter->setGroupName('1');
		  $filter->setAccess(0);
		 */


		$filter->sort('actionName', 'asc');
		$filter->sort('groupName', 'asc');
		$filter->sort('username', 'asc');
		$filter->sort('roleName', 'asc');


		$response = $permission->getPermissions($filter);

		$responseArray[] = array();
		foreach ($response as $resp)
		{
			$action = $resp->getAction();
			$group = $resp->getGroup();
			$user = $resp->getUser();
			$role = $resp->getRole();

			$responseArray[] = array(
				array('id', $resp->getId()),
				array('actionName', isset($action) ? $action->getName() : 'null'),
				array('groupName', isset($group) ? $group->getName() : 'null'),
				array('user', isset($action) ? $user->getUsername() : 'null'),
				array('role', isset($role) ? $role->getName() : 'null'),
			);
		}
		return json_encode($responseArray);
		//	$response = $auth->getPermission($filter);
		//	return $response->getUserId();
	}

	public function test()
	{

		//$response = $this->testActions();
		//$response = $this->testGroups();
		$response = $this->testUsers();
		//$response = $this->testAuthenticate();
		//$response = $this->testUserRoles(); 
		//$response = $this->testRoles();
		//$response = $this->testUserStatus();
		//$response = $this->testUserActivity();
		//$response = $this->testPermissions();
		//$response = $this->testAuth();

		$this->parse->assign('action', 'ID-UL ESTE :' . $response);


		//$user = new Pulse\Data\UsersRepository();
		//$input = new Pulse\Data\AuthenticateInput($CI);
		//$validator = new Pulse\Data\AuthenticateValidator($input);
		//$filter = new Pulse\Data\UsersRepositoryFilter();
		/* if( $validator->hasErrors() ){
		  $this->parse->assign('redirect', json_encode($validator->toArray()));

		  }else {
		  $redirect = $user->authenticate($input);


		  //
		  $filter->setUsername('1');
		  $redirect = $user->getUser($filter);
		  $this->parse->assign('action', $redirect);
		  }
		 */
		/*
		  $filter->setUsername('1');
		  $rezultat = $user->getUser($filter);
		  $rezultat = $user->getUsers($filter)->getIterator()->current();
		  $this->parse->assign('action', $rezultat->getUserName());
		 */

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


		$this->parse->view('test.tpl');
	}

}
