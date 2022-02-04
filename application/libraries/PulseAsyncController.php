<?php

require_once('PulseController.php');

abstract class PulseAsyncController extends PulseController
{
	protected $logThreshold;
	
	public function __construct() {
		parent::__construct();
		
		$this->logThreshold = $this->config->item('log_threshold');
	}

	protected function _error($message, array $data = null) {
		if( $data ) {
			$response = $data;
			$response['success'] = false;
			$response['message'] = $message;
		}
		else {
			$response = array (
				'success' => false
				, 'message' => $message
			);
		}

		echo(json_encode($response));
		//return $response;
	}
	
	protected function _success($response) {
		if( ! isset($response['success']) )
			$response['success'] = true;

		if( $this->logThreshold >= 2 ) {
			$trace = debug_backtrace(0);
			log_message('info', $trace[1]['class'] . ':' . $trace[1]['function'] 
					. " response:\n" . print_r($response, true));
		}
		
		echo(json_encode($response));
	}

	protected function _response($response) {
		if( $this->logThreshold >= 2 ) {
			$trace = debug_backtrace(0);
			log_message('info', $trace[1]['class'] . ':' . $trace[1]['function'] 
					. " response:\n" . print_r($response, true));
		}
		
		echo(json_encode($response));
	}

	protected function _accessDenied() {
		return $this->_error('Access denied.');
	}

	protected function _invalidAddress() {
		return $this->_error('Invalid address.');
	}

	protected function _logPost() {
		if( $this->config->item('log_threshold') < 2 )
			return;

		$trace = debug_backtrace(0);
		log_message('info', $trace[1]['class'] . ':' . $trace[1]['function'] 
				. " POST:\n" . print_r(filter_input_array(INPUT_POST), true));
	}
}
