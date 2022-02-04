<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'classes/repositories/authorizations/Auth.php');
require_once(APPPATH . 'classes/repositories/users/UsersRepository.php');

use mindplay\annotations\Annotations;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

abstract class PulseController extends CI_Controller
{

	protected $loggedUser;
	protected $version;
	protected $reqAuthentication;

	protected abstract function _accessDenied();

	protected abstract function _invalidAddress();

	public function __construct() {
		parent::__construct();

		$this->version = $this->config->item('version');
		$this->reqAuthentication = $this->_getAuthenticated();
		/*
		  if($this->reqAuthentication)
		  throw new \Exception('true ');
		  else throw new \Exception('false ');
		 * 
		 */
		$users = new \Pulse\Data\UsersRepository();
		$this->loggedUser = $users->getUser($this->session->userdata('user_id'));

	}

	public function getUser() {
		return $this->loggedUser;
	}

	
	/*
	public function _remap($method) {
		if( ! method_exists($this, $method) )
			return $this->_invalidAddress();

		$controller = $this->uri->rsegments[1];

		if ($this->_hasAccess()) {
			if ($method != 'logout' || $controller != 'preferences') {
				if (isset($this->preferences['offline']) && $this->preferences['offline'] != "0" && 
						!$this->loggedUser->hasRole(array(Role::Programmer, Role::Admin))) {
					$this->_offline($this->preferences['offline']);

					return;
				}
			}

			$args = $this->uri->rsegments;
			array_splice($args, 0, 2);
			call_user_func_array(array($this, $method), $args);
		}
		else
			return $this->_accessDenied();
	}
	*/
	
	
	
	
	
	
	
	public function _remap($method) {
		if( !method_exists($this, $method) )
			return $this->_invalidAddress();
		
		$controller = $this->uri->rsegments[1];
		
		//redirect
		if($controller != 'authenticate'){
		$redirect = '';
		for($i = 1; $i <= $this->uri->total_segments(); $i++)
			$redirect .= $this->uri->segment($i) . '/';

		$redirect = substr($redirect, 0, strlen($redirect) - 1);

		$this->session->set_flashdata('redirect', $redirect);
		}

		//autorizare pe clasă
		if($this->reqAuthentication && !$this->loggedUser && $controller != 'authenticate' )
			return $this->_offline();
	
		//autorizare pe metodă
		else if( $this->_hasAccess() || $controller == 'authenticate' ) {
			
			$args = $this->uri->rsegments;
			array_splice($args, 0, 2);
			call_user_func_array(array($this, $method), $args);
		}
		else
			return $this->_accessDenied();
	}

	protected function _getAuthenticated() {
		$annotations = Annotations::ofClass($this);
		
		return $this->checkClassAnnotations($annotations);
	}
	
	protected function checkClassAnnotations($annotations){
		
		$authenticated = false;
		if( count($annotations) ) {
			foreach($annotations as $annotation) {
				if( $annotation instanceof Pulse\Authenticated ) {
					$authenticated = true;
					break;
				}
			}
		}

		return $authenticated;
	}

 	protected function _hasAccess() {
		if( $this->reqAuthentication && !$this->loggedUser )
			return false;

		$method = $this->uri->rsegments[2];

		$annotations = Annotations::ofMethod($this, $method);
		
		return $this->checkMethodAnnotations($annotations);
	}
	
	protected function checkMethodAnnotations($annotations) {
		$auth = new \Pulse\Data\Auth();

		if( count($annotations) ) {
			foreach($annotations as $annotation) {
				if( $annotation instanceof Pulse\Permission ) {
					$filter = new \pulse\Data\AuthFilter();
					$filter->setGroupName($annotation->getResource());
					$filter->setUserId($this->loggedUser->getId());

					$users = new \pulse\Data\UsersRepository();
					$roleFilter = new \pulse\Data\UserRoleFilter();
					$roleFilter->setUserId($this->loggedUser->getId());
					
					$roleIds = array();
					foreach($users->getUserRoles($roleFilter) as $userRole)
						$roleIds[] = $userRole->getRole()->getId();
					$filter->setRoleId($roleIds);
					
					$action = $annotation->getAction();

						$filter->setActionName($action);

						if( !$auth->isAuthorized($filter) )
							return false;

				}
			}
		}

		return true;
	}

	/*
	protected function _hasAccess() {
		if( $this->reqAuthentication && !$this->loggedUser )
			return false;

		$method = $this->uri->rsegments[2];

		$annotations = Annotations::ofMethod($this, $method);

		$auth = new \Pulse\Data\Auth();

		if( count($annotations) ) {
			foreach($annotations as $annotation) {
				if( $annotation instanceof Pulse\Permission ) {
					$filter = new \pulse\Data\AuthFilter();
					$filter->setActionName($annotation->getAction());
					$filter->setGroupName($annotation->getResource());
					$filter->setUserId($this->getUser()->getID());
					//$filter->setUserId(1);


					$users = new \pulse\Data\UsersRepository();
					$roleFilter = new \pulse\Data\UserRoleFilter();
					$roleFilter->setUserId($this->getUser()->getID());
					//$roleFilter->setUserId(1);

					$roleIds = array();
					foreach($users->getUserRoles($roleFilter) as $userRole)
						$roleIds[] = $userRole->getRole()->getId();

					$filter->setRoleId($roleIds);

					if( !$auth->isAuthorized($filter) )
						return false;
				}
			}
		}

		return true;
	}
*/
	protected function _logException(Exception $exception) {
		if( $this->config->item('log_threshold') < 2 )
			return;

		// 
		// reverse array to make steps line up chronologically
		$trace = array_revers(explode("\n", $exception->getTraceAsString()));

		array_shift($trace); // remove {main}
		array_pop($trace); // remove call to this method
		$length = count($trace);
		$result = array();

		for($i = 0; $i < $length; $i++) {
			// replace '#someNum' with '$i)', set the right ordering
			$result[] = ($i + 1) . ')' . substr($trace[$i], strpos($trace[$i], ' '));
		}

		log_message('debug', "\t" . implode("\n\t", $result));
	}

}
