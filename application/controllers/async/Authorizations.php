<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/PulseAsyncController.php');
require_once(APPPATH . 'classes/repositories/authorizations/AddActionInput.php');
require_once(APPPATH . 'classes/repositories/authorizations/AddActionValidator.php');
require_once(APPPATH . 'classes/repositories/authorizations/ActionFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/GroupFilter.php');
require_once(APPPATH . 'classes/repositories/authorizations/DeleteActionInput.php');
require_once(APPPATH . 'classes/repositories/authorizations/DeleteActionValidator.php');
require_once(APPPATH . 'classes/repositories/authorizations/UpdateActionInput.php');
require_once(APPPATH . 'classes/repositories/authorizations/UpdateActionValidator.php');

class Authorizations extends PulseAsyncController
{

	protected $authorization;

	public function __construct() {
		parent::__construct();

		$this->authorization = new Pulse\Data\AuthorizationsRepository();
	}

	/**
	 * @Permission('authorizations', 'view')
	 */
	public function browseAuthorizations() {
		$filter = new Pulse\Data\ActionFilter($this);
		$data = $this->authorization->getActions($filter);
		$count = $this->authorization->countActions($filter);
		$response = array(
			'page' => (int) $filter->getPage()
			, 'total' => ceil($count / $filter->getRows())
			, 'records' => $count
			, 'rows' => array()
		);

		foreach($data as $entry) {
			$response['rows'][] = array(
				'id' => $entry->getId()
				, 'cell' => array(
					$entry->getAuthActionGroup()->getName()
					, $entry->getName()
					, $entry->getDescription()
				)
			);
		}

		$this->_success($response);
	}

	/**
	 * @Permission('authorizations', 'view')
	 */
	public function getResource() {

		$authorizationsRepository = new Pulse\Data\AuthorizationsRepository;
		$filter = new Pulse\Data\GroupFilter($this);

		$authorizations = $authorizationsRepository->getGroups($filter);

		$result = array();
		foreach($authorizations as $auth) {
			$result[] = array(
				'id' => $auth->getName(),
				'text' => $auth->getName());
		}

		$response = array(
			'success' => true,
			'items' => $result
		);

		echo(json_encode($response));
	}

	/**
	 * @Permission('authorizations', 'add')
	 */
	public function addAction() {

		$input = new \Pulse\Data\AddActionInput($this);

		$validator = new \Pulse\Data\AddActionValidator($input);

		if( $validator->hasErrors() ) {
			$this->_error('The new action was not added', $validator->toArray());
		}
		else {
			try {
				$this->authorization->addAction($input);
				$response = array(
					'success' => true
				);
			}
			catch(Exception $exception) {
				$response['message'] = $exception->getMessage();
				return $this->_error($response);
			}
			$this->_success($response);
		}
	}

	/**
	 * @Permission('authorizations', 'delete')
	 */
	public function deleteAction() {

		$actions = new \Pulse\Data\AuthorizationsRepository();
		$input = new \Pulse\Data\DeleteActionInput($this);
		$validator = new \Pulse\Data\DeleteActionValidator($input);

		if( $validator->hasErrors() ) {
			return $this->_error('Can\'t delete the action', $validator->toArray());
		}

		$response = array('success' => false);
		try {
			$actions->deleteAction($input);
			$response['success'] = true;
		}
		catch(Exception $exception) {
			$response['message'] = $exception->getMessage();
			return $this->_error($response);
		}

		return $this->_success($response);
	}

	/**
	 * @Permission('authorizations', 'view')
	 */
	public function getAction() {

		$authorization = new \Pulse\Data\AuthorizationsRepository();

		$filter = new \Pulse\Data\ActionFilter($this);
		$action = $authorization->getAction($filter);
		$group = $action->getAuthActionGroup();
		$response = array(
			'success' => true
			, 'action' => array(
				'groupName' => $group->getName()
				, 'groupDescription' => $group->getDescription()
				, 'actionName' => $action->getName()
				, 'actionDescription' => $action->getDescription()
			)
		);
		echo(json_encode($response));
	}

	/**
	 * @Permission('authorizations', 'update')
	 */
	public function updateAction() {
		$input = new \Pulse\Data\UpdateActionInput($this);
		$validator = new \Pulse\Data\UpdateActionValidator($input);
		if( $validator->hasErrors() )
			return $this->_error('The action couldn\'t be updated', $validator->toArray());

		$response = array('success' => false);

		try {
			$actions = new \Pulse\Data\AuthorizationsRepository();

			$action = $actions->updateAction($input);

			$response['success'] = true;
			$response['id'] = $action->getId();
		}
		catch(Exception $exception) {
			$response['message'] = $exception->getMessage();
			return $this->_error($response);
		}

		return $this->_success($response);
	}

}
