<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'libraries/PulseSyncController.php');
require_once(APPPATH . 'classes/repositories/authorizations/Auth.php');
require_once(APPPATH . 'classes/repositories/authorizations/AuthFilter.php');

class TestAuth extends PulseSyncController
{

	public function __construct() {
		parent::__construct();
	}

	public function testAuth($actionName, $groupName, $userId) {
		$auth = new \Pulse\Data\Auth();
		$filter = new \pulse\Data\AuthFilter();
		$filter->setActionName($actionName);
		$filter->setGroupName($groupName);
		$filter->setUserId($userId);



		$users = new \pulse\Data\UsersRepository();
		$roleFilter = new \pulse\Data\UserRoleFilter();
		$roleFilter->setUserId($userId);

		$roleIds = array();
		foreach($users->getUserRoles($roleFilter) as $userRole)
			$roleIds[] = $userRole->getRole()->getId();

		$filter->setRoleId($roleIds);
		if( !$auth->isAuthorized($filter) )
			return false;

		return true;
	}

	public function test() {

		$teste = array();
		
		//Verificăm pentru user-ul curent, cu toate rolurile sale dacă are acces la o anumită acțiune
		//dintr-o anumită resursă
		
		//Există 8 cazuri de permisiuni.
		
		//Primul caz. User-ul are acces la toată resursa.
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group1', 'userId' => 1, 'accesCorect' => 'Da');

		//Al doilea caz. User-ul are acces la acțiune 
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group2', 'userId' => 1, 'accesCorect' => 'Da');

		//Al treilea caz. Unul din rolurile user-ului are acces la toată resursa 
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group3', 'userId' => 1, 'accesCorect' => 'Da');

		//Al patrulea caz. Unul din rolurile user-ului are acces la acțiune
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group4', 'userId' => 1, 'accesCorect' => 'Da');
 
		//Al cincilea caz.  User-ul nu are acces la resursa.
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group5', 'userId' => 2, 'accesCorect' => 'Nu');

		//Al șaselea caz. User-ul nu are acces la acțiune 
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group6', 'userId' => 2, 'accesCorect' => 'Nu');

		//Al șaptelea caz. Unul din rolurile user-ului nu are acces la resursă 
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group7', 'userId' => 2, 'accesCorect' => 'Nu');

		//Al optulea caz. Unul din rolurile user-ului nu are acces la acțiune
		$teste[] = array('actionName' => 'Add', 'groupName' => 'group8', 'userId' => 2, 'accesCorect' => 'Nu');


		$data = array();

		foreach($teste as $test) {
			$temp = 'User-ul: ' . $test['userId'] . '; actiunea: ' . $test['actionName'] . '; resursa: ' .
					$test['groupName'] . '; acces corect: ' . $test['accesCorect'];
			if( $this->testAuth($test['actionName'], $test['groupName'], $test['userId']) ) {
				$temp .= '; acces actual: Da';
			}
			else {
				$temp .= '; acces actual: Nu';
			}
			$data[] = $temp;
		}
		$this->parse->assign('data', str_replace(',', '<br/>', json_encode($data)));
		$this->parse->view('testAuth.tpl');
	}

}
