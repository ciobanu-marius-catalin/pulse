<?php

namespace Pulse\Data;

require_once(APPPATH . 'classes\repositories\BaseInput.php');

class DeleteUserInput extends \Repositories\BaseInput
{

	protected $userId;
	
	/**
	 * @Column(type="datetime", name="EndDate")
	 * @var \DateTime
	 */
	public $startDate;
	
	public function __construct(\CI_Controller &$ci = null) {
		parent::__construct($ci);
	}

	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}
	
	/**
	 * @return \DateTime
	 */
	public function getStartDate() {
		$this->startDate;
	}
	
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}

}
