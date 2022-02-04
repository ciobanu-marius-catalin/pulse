<?php

require_once('PulseController.php');

use mindplay\annotations\Annotations;

class PulseSyncController extends PulseController
{

	public function __construct() {
		parent::__construct();

		$this->load->library('parse');

		// Templates
		$this->_buildMenus();
	}

	public function hasPermissions($controller, $method) {
		//return true;

		if( !$this->hasControllerPermission($controller) )
			return false;
		return $this->hasMethodPermisson($controller, $method);
	}

	protected function hasMethodPermisson($controller, $method) {
		
		
		$annotations = Annotations::ofMethod($controller, $method);

		return $this->checkMethodAnnotations($annotations);
	}

	protected function hasControllerPermission($controller) {
		require_once(APPPATH . 'controllers/' . $controller . '.php');
		
		$annotations = Annotations::ofClass($controller);

		$reqAuthenticated = $this->checkClassAnnotations($annotations);

		if( $reqAuthenticated && !$this->loggedUser )
			return false;

		return true;
	}

	protected function _offline() {
		redirect('authenticate/index');
	}

	protected function _accessDenied() {
		redirect('Error/accessDenied');
	}

	protected function _invalidAddress() {
		redirect('Error/pageNotFound');
	}

	protected function _buildMenus() {
		//return ;
		require_once(APPPATH . 'classes/menus/' . $this->config->item('version') . 'Menu2.php');

		$versionMenus = new ApplicationMenu2();
		$menus = $versionMenus->getVisibleMenus();

		$_menus = array();
		foreach($menus as $label => $menu) {
			$activeClass = $menu['active'] ? ' active' : '';

			$_menu = array(
				'label' => $label
				, 'activeClass' => $activeClass
				, 'menus' => array()
			);

			foreach($menu['entries'] as $sublabel => $submenu) {
				if( $sublabel != 'separator' ) {
					$_submenu = array(
						'label' => $sublabel
						, 'url' => site_url($submenu['controller'] . '/' . $submenu['method'])
					);
				}
				else
					$_submenu = null;

				$_menu['menus'][] = $_submenu;
			}

			$_menus[] = $_menu;
		}

		$this->parse->assign('version', $this->version);
		$this->parse->assign('menus', $_menus);
		$this->parse->assign('user', $this->getUser());
	}

}
