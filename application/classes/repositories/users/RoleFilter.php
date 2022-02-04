<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');

use Repositories\BaseFilter as BaseFilter;

class RoleFilter extends BaseFilter
{

	protected $id;
	
	protected $name;
	
	protected $description;
	
	public function __construct(\CI_Controller &$ci = null)
	{
		parent::__construct($ci);
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getDescription()
	{
		return $this->description;
	}
	
	public function setDescription($description)
	{
		$this->description = $description;
	}

}
