<?php

namespace pulse;

/**
 * @usage("method" => true)
 */
class Permission implements \mindplay\annotations\IAnnotation
{
	private $resource;
	private $action;

	public function initAnnotation(array $permissions) {
		$this->resource = $permissions[0];
		$this->action = $permissions[1];
	}
	
	public function getResource() {
		return $this->resource;
	}

	public function getAction() {
		return $this->action;
	}
}
