<?php
/**
 * @copyright (c) 2014, Antiferno SRL
 * @license http://www.gnu.org/licenses/gpl.html GPLv3
 * @author Andrei Ionescu
 * @link www.antiferno.ro
 */

namespace Repositories;

abstract class BaseInput
{
	protected $ci;

	protected function __construct(\CI_Controller &$ci = null) {
		//\Logger::mark(__FILE__ . ':' . __LINE__);
		if( $ci ) {
			//\Logger::mark(__FILE__ . ':' . __LINE__);
			$this->ci =& $ci;

			$class = new \ReflectionClass(get_class($this));

			foreach($class->getProperties() as $property) {
				//Logger::var_dump(__FILE__ . ':' . __LINE__ . '@property', $property->getName());
				/* @var $property \ReflectionProperty */
				if( $property->getName() == 'ci' )
					continue;

				$property->setAccessible(true);

				//\Logger::var_dump(__FILE__ . ':' . __LINE__ . '@getDocComment', $property->getDocComment());

				$annotations = array();
				if( ! preg_match_all('/@(.+)\n/', $property->getDocComment(), $annotations) ) {
					//Logger::mark(__FILE__ . ':' . __LINE__);
					$property->setValue($this, $this->post($property->getName()));

					continue;
				}

				//Logger::var_dump(__FILE__ . ':' . __LINE__ . '@annotations', $annotations);

				if( in_array('ignore', $annotations[1]) )
					continue;

				//Logger::var_dump(__FILE__ . ':' . __LINE__ . '@name', $property->getName());
				//Logger::var_dump(__FILE__ . ':' . __LINE__ . '@annotations', $annotations);

				/*if( in_array('Calendar', $annotations[1]) || (strpos($annotations[1][0], 'var ') === 0 && strpos($annotations[1][0], 'Calendar')) ) {
					if( $class->hasProperty($property->getName() . 'Source') ) {
						$sourceProperty = $class->getProperty($property->getName() . 'Source');
						//Logger::mark(__FILE__ . ':' . __LINE__);
						$sourceProperty->setValue($this, $this->post($property->getName() . 'Source'));

						if( $sourceProperty->getValue($this) )
							$property->setValue($this, \Calendar::fromObject($sourceProperty->getValue($this)));
					}
					else {
						//Logger::mark(__FILE__ . ':' . __LINE__);
						$property->setValue($this, \Calendar::fromObject($this->post($property->getName( ))));
					}
				}*/
				if( in_array('Calendar', $annotations[1]) || (strpos($annotations[1][0], 'var ') === 0 && strpos($annotations[1][0], 'Calendar')) ) {
					if( $class->hasProperty($property->getName() . 'Source') ) {
						$sourceProperty = $class->getProperty($property->getName() . 'Source');
						//Logger::mark(__FILE__ . ':' . __LINE__);
						$sourceProperty->setValue($this, $this->post($property->getName() . 'Source'));

						if( $sourceProperty->getValue($this) )
							$property->setValue($this, \DateTime::createFromFormat('Y-m-d H:i:s', $sourceProperty->getValue($this)));
					}
					else {
						//Logger::mark(__FILE__ . ':' . __LINE__);
						$property->setValue($this, \DateTime::createFromFormat('Y-m-d H:i:s', $this->post($property->getName())));
					}
				}
				else if( strpos($annotations[1][0], 'var ') === 0 ) {
					//\Logger::var_dump(__FILE__ . ':' . __LINE__ . '@annotations', $annotations);
					if( strpos($annotations[1][0], ' boolean') ) {
						$value = $this->post($property->getName(), false, false);

						if( $value === '0' )
							$property->setValue($this, false);
						else if( $value === '1' )
							$property->setValue($this, true);
					}
					else if( strpos($annotations[1][0], ' bit') ) {
						$value = $this->post($property->getName(), false, false);

						if( $value === '0' )
							$property->setValue($this, 0);
						else if( $value === '1' )
							$property->setValue($this, 1);
					}
					else if( strpos($annotations[1][0], ' int') ) {
						//\Logger::mark(__FILE__ . ':' . __LINE__);
						$value = $this->post($property->getName(), false, false);
						//\Logger::var_dump(__FILE__ . ':' . __LINE__ . '@value', $value);

						if( $value !== null && $value !== false && is_numeric($value) ) {
							//\Logger::mark(__FILE__ . ':' . __LINE__);
							$property->setValue($this, (int) $value);
						}
					}
					else if( strpos($annotations[1][0], ' file') ) {
						//Logger::mark(__FILE__ . ':' . __LINE__);
						$value = $_FILES[$property->getName()];

						$property->setValue($this, $value);
					}
					else
						$property->setValue($this, $this->post($property->getName()));
				}
				else {
					//Logger::mark(__FILE__ . ':' . __LINE__);
					$property->setValue($this, $this->post($property->getName()));
				}
			}
		}
	}

	/**
	 * 
	 * @param string $name
	 * @param bool $trim TRUE if data is to be trimmed. Default is TRUE.
	 * @param bool $nullIfEmpty TRUE if data is to be nullified if empty string. Default is TRUE.
	 * @return string|array
	 */
	protected function post($name, $trim = true, $nullIfEmpty = true) {
		$value = $this->ci->input->post($name);

		if( ! $value && $nullIfEmpty )
			$value = null;

		if( $value && ! is_array($value) ) {
			if( $trim )
				$value = trim($value);

			if( $nullIfEmpty ) {
				if( mb_strlen($value) == 0 )
					$value = null;
			}
		}

		return $value;
	}

	public function getCI() {
		return $this->ci;
	}

	public function toArray() {
		$class = new \ReflectionClass(get_class($this));

		$result = array();

		foreach($class->getProperties() as $property) {
			/* @var $property \ReflectionProperty */
			if( $property->getName() == 'ci' )
				continue;

			$property->setAccessible(true);

			$result[$property->getName()] = $property->getValue($this);
		}

		return $result;
	}

	public function toHTMLInputs() {
		$values = $this->toArray();

		$inputs = array();

		foreach($values as $name => $value) {
			if( is_array($value) ) {
				foreach($value as $item)
					$inputs[] = '<input type="hidden" name="' . $name .'[]" value="' . $item . '"/>';
			}
			else
				$inputs[] = '<input type="hidden" name="' . $name .'" value="' . $value . '"/>';
		}

		return implode('', $inputs);
	}
}
