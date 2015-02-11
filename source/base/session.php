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

class Session {

	protected $sessions = array();

	/**
	 * Detect existence of session variable
	 * @param type $key
	 * @return type
	 */
	public function hasSession($key) {
		return (isset($_SESSION[$key]));
	}

	/**
	 * Return a session value
	 * @param type $key
	 * @return type
	 */
	public function getSession($key) {
		if ($this -> hasSession($key)) {
			return $_SESSION[$key];
		}
		return false;
	}

	/**
	 * Set a session value
	 * @param string $key
	 * @param string $value
	 */
	public function setSession($key, $value) {
		$_SESSION[$key] = $value;
	}

	/**
	 * Set all session parameters
	 * @param array $data
	 */
	public function setSessions($data) {
		foreach ($data as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}

	/**
	 * Check if more than 0 elements are in $_SESSION global array
	 */
	public function hasSessions() {
		if (count($_SESSION) > 0) {
			return true;
		}
		return false;
	}

}
