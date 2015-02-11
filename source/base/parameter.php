<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace base;

class Parameter {

	protected $parameters = array();

	/**
	 * Class constructor
	 * @param array $data
	 */
	function __construct($data) {
		$this -> setParameters($data);
	}

	/**
	 * Detect existence of parameter variable
	 * @param type $key
	 * @return type
	 */
	public function hasParameter($key) {
		return (isset($this -> parameters[$key]));
	}

	/**
	 * Return a parameter value
	 * @param type $key
	 * @return type
	 */
	public function getParameter($key) {
		if ($this -> hasParameter($key)) {
			return $this -> parameters[$key];
		}
		return false;
	}

	/**
	 * Set a parameter value
	 * @param string $key
	 * @param string $value
	 */
	public function setParameter($key, $value) {
		$this -> parameters[$key] = $value;
	}

	/**
	 * Set all post parameters
	 * @param array $data
	 */
	public function setParameters($data) {
		foreach ($data as $key => $value) {
			$this -> parameters[$key] = $value;
		}
	}

	public function hasParameters() {
		if (count($this -> parameters) > 0) {
			return true;
		}
		return false;
	}

}
