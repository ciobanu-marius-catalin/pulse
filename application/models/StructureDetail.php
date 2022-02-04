<?php

namespace pulse\models;

require_once(APPPATH . 'models/base/DataObject.php');
require_once('Structure.php');
require_once('EmployeeStructure.php');

/**
 * @Entity
 * @Table(name="StructureDetail")
 * @HasLifecycleCallbacks
 */
class StructureDetail extends \Antiferno\Data\DataObject
{
	/**
	 * @ManyToOne(targetEntity="Structure")
	 * @JoinColumn(name="StructureID",referencedColumnName="ID")
	 * @var Structure
	 */
    protected $structure;
    
    /**
     * @OneToMany(targetEntity="EmployeeStructure", mappedBy="structureDetail")
     */
    protected $employeesStructure;
    
    /** @Column(type="integer", name="StructureID") */
	protected $structureID;
    
    /** @Column(type="integer", name="ParentID") 
    * @var int     */
	protected $parentId;
    
    /**
	 * @Column(type="string", name="Code")
	 * @var string
	 */
	protected $code;

	/**
	 * @Column(type="string", name="Name")
	 * @var string
	 */
	protected $name;

	/**
	 * @Column(type="string", name="Description")
	 * @var string
	 */
    protected $description;
    
    /** @Column(type="integer", name="Left") */
	protected $left;
    
    /** @Column(type="integer", name="Right") */
	protected $right;
	
	public function getStructure() {
		return $this->structure;
	}
		
	public function getEmployeesStructure() {
		return $this->employeesStructure;
	}
    
    public function getStrucureID() {
        return $this->structureID;
	}

	public function setStrucureID($structureID) {
		$this->structureID = $structureID;
	}
    
    public function getParentId() {
		return $this->parentId;
	}

	public function setParentId($parentId) {
		$this->parentId = $parentId;
	}
	
	public function getCode() {
		return $this->code;
	}

	public function setCode($code) {
		$this->code = $code;
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
    
     public function getLeft() {
		return $this->left;
	}

	public function setLeft($left) {
		$this->left = $left;
	}
	
	public function getRight() {
		return $this->right;
	}

	public function setRight($right) {
		$this->right = $right;
	}
}
