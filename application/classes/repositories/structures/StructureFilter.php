<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes/repositories/BaseFilter.php');
require_once(APPPATH . 'models/Structure.php');
require_once(APPPATH . 'models/StructureDetail.php');

use Repositories\BaseFilter as BaseFilter;

class StructureFilter extends BaseFilter
{
	protected $id;
    
    protected $detailId;
    
    protected $parentId;
    
    protected $detailName;
    
    protected $code;
    
    protected $left;
    
    protected $right;
   	
	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}
    
    public function getId() {
		return $this->id;
	}
        
	public function setId($id) {
		$this->id = $id;
	}
    
    public function getDetailId() {
		return $this->detailId;
	}
        
	public function setDetailId($detailId) {
		$this->detailId = $detailId;
	}

    public function getParentId() {
		return $this->parentId;
	}
        
	public function setParentId($parentId) {
		$this->parentId = $parentId;
	}
    
    public function getDetailName() {
		return $this->detailName;
	}
        
	public function setDetailName($detailName) {
		$this->detailName = $detailName;
	}
    
    public function getCode() {
		return $this->code;
	}
        
	public function setCode($code) {
		$this->code = $code;
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
