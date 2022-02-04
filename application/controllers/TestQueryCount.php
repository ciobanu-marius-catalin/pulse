<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once(APPPATH . 'libraries/PulseSyncController.php');
require_once(APPPATH . 'classes/repositories/authorizations/AuthorizationsRepository.php');
require_once(APPPATH . 'classes/repositories/authorizations/ActionFilter.php');

class TestQueryCount extends PulseSyncController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function testActions()
	{

		$action = new \Pulse\Data\AuthorizationsRepository();
		$filter = new \Pulse\Data\ActionFilter();

		
		
		$filter->page = 2;
		$filter->setRows(1);
		$filter->sort('actionName');
		$results = $action->getActions($filter);
		
		$actionData[] = array( 'count' => $results->count());

		foreach ($results as $result)
		{
			$actionData[] =
				array
				(
				array('actionName' => $result->getName())
				, array('groupName' => $result->getAuthActionGroup()->getName())
				, array('actionDescription' => $result->getDescription())
				);
		}

		$this->parse->assign('data', json_encode($actionData));
		$this->parse->view('testQueryCount.tpl');
	}

}
