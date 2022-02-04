<?php
use mindplay\annotations\AnnotationCache;
use mindplay\annotations\Annotations;

require_once('annotations/Authenticated.php');
require_once('annotations/Permission.php');

class Acl
{
	public function __construct() {
		$CI =& get_instance();

		Annotations::$config['cache'] = new AnnotationCache($CI->config->item('cache_path'));

		$manager = Annotations::getManager();

		$manager->registry['authenticated'] = 'pulse\Authenticated';
		$manager->registry['permission'] = 'pulse\Permission';
	}
}
