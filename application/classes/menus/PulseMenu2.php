<?php

require_once('BaseMenu2.php');

/**
 * Description of JCRMenu2
 *
 * @author andrei
 */
class ApplicationMenu2 extends BaseMenu2
{
	public function __construct() {
		parent::__construct();
	}

	protected function getMenus() {
		$menus = array (
			'Authorizations' => array (
				'entries' => array (
					'Authorizations' => array ('controller' => 'Authorizations', 'method' => 'index')
					//, 'separator' => array('controller' => 'bikes', 'method' => 'register')
				)
			)
			, 'Users' => array (
				'entries' => array (
					'Users' => array ('controller' => 'Users', 'method' => 'index')
					//, 'separator' => array('controller' => 'bikes', 'method' => 'register')
				)
			)
			, 'Employees' => array (
				'entries' => array (
					'Employees' => array ('controller' => 'Employees', 'method' => 'index')
				)
			)				
		);

		return $menus;
	}
}








