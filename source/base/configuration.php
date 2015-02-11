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

class configuration
{

    protected $configuration = array();

    /**
     * Set configuration valuesF
     * @param string $key
     * @param string $value
     */
    public function set($key, $value)
    {
        $this->configuration[$key] = $value;
    }

    /**
     * Get configuration values
     * @param string $variable
     * @return string
     */
    public function get($variable)
    {
        return $this->configuration[$variable];
    }

}
