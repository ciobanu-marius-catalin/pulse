<?php
/**
 * @copyright (c) 2014, Antiferno SRL
 * @license http://www.gnu.org/licenses/gpl.html GPLv3
 * @author Andrei Ionescu
 * @link www.antiferno.ro
 */
namespace Repositories;

use \DateTime as DateTime;

require_once('BaseInput.php');

abstract class BaseFilter extends BaseInput 
{
	public $sort = array();

	public $isNull = array();

	public $isNotNull = array();
	
	//page și rows sunt folosiți pentru paginare
	public $page;
	public $rows;

	
	// Ordonare din grid
	public $sidx;
	public $sord;
	
	// Căutare din grid
	public $search;



	/**
	 *
	 * @var DateTime
	 */
	public $referenceDate;
	/**
	 *
	 * @var DateTime
	 */
	public $startDate;
	/**
	 *
	 * @var DateTime
	 */
	public $endDate;
	/**
	 * @var DateTime
	 */
	public $startDateLowerLimit;
	/**
	 * @var DateTime
	 */
	public $startDateUpperLimit;
	/**
	 * @var DateTime
	 */
	public $endDateLowerLimit;
	/**
	 * @var DateTime
	 */
	public $endDateUpperLimit;

	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);

		$this->referenceDate = new DateTime();

		if( ! $this->page )
			$this->page = 1;
			
		if( ! $this->isNull )
			$this->isNull = array();

		if( ! $this->isNotNull )
			$this->isNotNull = array();
		
		if( ! $this->sort )
			$this->sort = array();

		if( $this->sidx )
			$this->sort($this->sidx, $this->sord);
	}
		
	public function sort($key, $direction = 'asc') {
		$this->sort[$key] = $direction == 'desc' ? 'desc' : 'asc';
	}
	
	public function unsort($key) {
		if( isset($this->sort[$key]) )
			unset($this->sort[$key]);
	}
	
	public function getSort() {
		return $this->sort;
	}
	
	public function getPage() {
		return $this->page;
	}
	
	/*
	 * @return int
	 */
	public function getRows() {
		return $this->rows;
	}
	
	public function setRows($rows) {
		$this->rows = $rows;
	}

	/**
	 * 
	 * @return DateTime
	 */
	public function getReferenceDate() {
		return $this->referenceDate;
	}
	
	public function setReferenceDate(DateTime $referenceDate = null) {
		$this->referenceDate = $referenceDate;
	}

	/**
	 * 
	 * @return DateTime
	 */
	public function getStartDate() {
		return $this->startDate;
	}

	public function setStartDate(DateTime $startDate = null) {
		$this->startDate = $startDate;
	}

	/**
	 * 
	 * @return DateTime
	 */
	public function getEndDate() {
		return $this->endDate;
	}

	public function setEndDate(DateTime $endDate = null) {
		$this->endDate = $endDate;
	}
	

	public function getIsNull() {
		return $this->isNull;
	}

	public function isNull($isNull) {
		if( ! in_array($isNull, $this->isNull) )
			$this->isNull[] = $isNull;
	}

	public function getIsNotNull() {
		return $this->isNotNull;
	}

	public function isNotNull($isNotNull) {
		if( ! in_array($isNotNull, $this->isNotNull) )
			$this->isNotNull[] = $isNotNull;
	}

	public function getSearch() {
		return $this->search;
	}

	public function setSearch($search) {
		$this->search = $search;
	}
	

	/**
	 * @return DateTime
	 */
	public function getStartDateLowerLimit() {
		return $this->startDateLowerLimit;
	}

	public function setStartDateLowerLimit(DateTime $startDateLowerLimit = null) {
		$this->startDateLowerLimit = $startDateLowerLimit;
	}

	/**
	 * @return DateTime
	 */
	public function getStartDateUpperLimit() {
		return $this->startDateUpperLimit;
	}

	public function setStartDateUpperLimit(DateTime $startDateUpperLimit = null) {
		$this->startDateUpperLimit = $startDateUpperLimit;
	}

	/**
	 * @return DateTime
	 */
	public function getEndDateLowerLimit() {
		return $this->endDateLowerLimit;
	}

	public function setEndDateLoweLimit(DateTime $endDateLowerLimit = null) {
		$this->endDateLowerLimit = $endDateLowerLimit;
	}

	/**
	 * @return DateTime
	 */
	public function getEndDateUpperLimit() {
		return $this->endDateUpperLimit;
	}

	public function setEndDateXor(DateTime $endDateUpperLimit = null) {
		$this->endDateUpperLimit = $endDateUpperLimit;
	}
}
