<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseSyncController.php');

class Poc extends PulseSyncController
{
	public function __construct() {
		parent::__construct();
	}
	
	//funcționează doar cu versiunea 3.5.2 de select2
	public function select2_4X()
	{
		$this->parse->view('poc/select2_4X.tpl');
	}

	//funcționează doar cu versiunea 2.2.4 de jquery. Când este folosită versiunea 3.1.0 nu apare calendarul
	public function datetimepicker1X()
	{
		$this->parse->view('poc/datetimepicker1X.tpl');
	}

	public function jquery3X()
	{
		$this->parse->view('poc/jquery3X.tpl');
	}

}
