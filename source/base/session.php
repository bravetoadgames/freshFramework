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

class Session
{

    protected $values = array();

    function __construct()
    {
        $this->prepareSessions();
    }

    private function prepareSessions()
    {
        $this->values = array();
        foreach ($_SESSION as $key => $value) {
            $this->values[$key] = $value;
        }
    }

    /**
     * Detect existence of session variable
     * @param type $key
     * @return type
     */
    public function hasSession($key)
    {
        return (isset($this->values[$key]));
    }

    /**
     * Return a session value
     * @param type $key
     * @return type
     */
    public function get($key)
    {
        if ($this->hasSession($key)) {
            return $this->values[$key];
        }
        return false;
    }

    /**
     * Set a session value
     * @param string $key
     * @param string $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        $this->values[$key] = $value;
    }

    /**
     * Set a session value
     * @param string $key
     * @param string $value
     */
    public function delete($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * Set all session parameters
     * @param array $data
     */
    public function setSessions()
    {
        foreach ($this->values as $key => $value) {
            $_SESSION[$key] = $this->values[$key];
        }
    }

    /**
     * Check if more than 0 elements are in $_SESSION global array
     */
    public function hasSessions()
    {
        if (count($this->values) > 0) {
            return true;
        }
        return false;
    }

}
