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

class Model
{

    /**
     * Check if model already has a DB ID
     */
    public function isNew()
    {
        if ($this->get('id') == 0) {
            return true;
        }
        return false;
    }

    /**
     * Set value in model object
     * @param string $key
     * @param string $value
     */
    public function set($key, $value)
    {
        $this->values[$key] = $value;
    }

    /**
     * Get value from model object
     * @param string $key
     * @return value
     */
    public function get($key)
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return false;
    }

    /**
     * get model fields
     */
    public function getFieldSet()
    {
        return $this->fieldSet;
    }

}
