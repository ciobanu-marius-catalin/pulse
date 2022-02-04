<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once(APPPATH . 'models/StructureDetail.php');
require_once('EmployeeStructure.php');
require_once('StructureDetail.php');

/**
 * @Entity
 * @Table(name="Structure")
 * @HasLifecycleCallbacks
 */
class Structure extends \Antiferno\Data\DataObject
{
    /**
	 * @OneToMany(targetEntity="EmployeeStructure", mappedBy="structure")
	 * @var ArrayCollection
	 */
	protected $employeesStructure;
	
	/**
	 * @OneToMany(targetEntity="StructureDetail", mappedBy="structure")
	 */
	protected $details;
        
    /**
	 * @Column(type="string", name="name")
	 * @var string
	 */
	protected $name;
    
	/**
	 * @Column(type="string", name="Description")
	 * @var string
	 */
	protected $description;    

	public function getEmployeesStructure() {
		return $this->employeesStructure;
	}    
    
	public function getDetails() {
		return $this->details;
	}
	
	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}
}
