<?php

namespace Repositories;

abstract class BaseValidator
{
	protected $errors = array();
	protected $messages = array();
	protected $warnings = array();
	protected $qualifiedWarnings = array();

	//abstract public function validate($input);

	protected function _error($key, $message) {
		if( ! isset($this->errors[$key]) )
			$this->errors[$key] = array($message);
		else
			$this->errors[$key][] = $message;
	}

	protected function error($key, $message) {
		if( $key === null )
			$this->messages[] = $message;
		else {
			if( ! isset($this->errors[$key]) )
				$this->errors[$key] = array();

			$this->errors[$key][] = $message;
		}
	}

	protected function warning($key, $message) {
		if( $key == null )
			$this->warnings[] = $message;
		else {
			if( ! isset($this->qualifiedWarnings[$key]) )
				$this->qualifiedWarnings[$key] = array();

			$this->qualifiedWarnings[$key][] = $message;
		}
	}

	public function getErrors() {
		return $this->errors;
	}

	public function getMessages() {
		return $this->messages;
	}

	public function hasErrors() {
		return count($this->errors) > 0 || count($this->messages) > 0;
	}

	public function hasWarnings() {
		return count($this->warnings) > 0 || count($this->qualifiedWarnings) > 0;
	}

	public function toArray() {
		return array (
			'errors' => $this->errors
			, 'messages' => $this->messages
			, 'warnings' => $this->warnings
			, 'qualifiedWarnings' => $this->qualifiedWarnings
		);
	}

	protected function clearErrors($key) {
		unset($this->errors[$key]);
		unset($this->qualifiedWarnings[$key]);
	}

	protected function message($key) {
		if( ! $this->ci )
			$this->ci =& get_instance();

		return $this->ci->lang->line($key);
	}
}
