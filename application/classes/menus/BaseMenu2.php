<?php

/**
 * Description of BaseMenu2
 *
 * @author andrei
 */
abstract class BaseMenu2
{
	public function __construct() {
	}

	abstract protected function getMenus();

	public function getVisibleMenus() {
		$menus = $this->getMenus();

		$CI =& get_instance();
		$controller = $CI->uri->rsegments[1];
		$method = $CI->uri->rsegments[2];

		foreach($menus as $label => $menu) {
			$visible = false;
			$active = false;

			if( isset($menu['entries']) ) {
				foreach($menu['entries'] as $elabel => $entry) {
					if( isset($entry['controller']) && isset($entry['method']) ) {
						if( ! $CI->hasPermissions($entry['controller'], $entry['method']) )
							unset($menus[$label]['entries'][$elabel]);
						else {
							$visible = true;

							$active = $controller == $entry['controller'] && $method == $entry['method'];
						}
					}
				}
			}

			if( ! $visible )
				unset($menus[$label]);
			else
				$menus[$label]['active'] = $active;
		}

		return $menus;
	}
}
