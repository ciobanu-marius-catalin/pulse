<?php

function smarty_function_bundle($params, &$smarty) {
	if( ! function_exists('get_instance') )
		return "Can't get CI instance";

	$CI= &get_instance();

    if( ! function_exists('base_url') )
        $CI->load->helper('url');

	$bundles = $CI->config->item('bundles');

	$result = array();
	if( isset($bundles[$params['name']]) ) {
		foreach($bundles[$params['name']] as $resource) {
			if( strpos($resource, '.js') == strlen($resource) - strlen('.js') )
				$result[] = '<script type="text/javascript" src="' . base_url() . 'assets/js/' . $resource. '"></script>';
			else if( strpos($resource, '.css') == strlen($resource) - strlen('.css') )
				$result[] = '<link href="' . base_url() . 'assets/css/' . $resource . '" rel="stylesheet" type="text/css"/>';
		}
	}

	return implode("\n", $result);
}
