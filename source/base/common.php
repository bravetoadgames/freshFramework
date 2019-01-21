<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace Base;

use base;

class Common
{

    private $sessionParameter = null;

    function __construct()
    {
        $this->sessionParameter = new Session();
    }

    public static function validateEmail($email = "")
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateUrl($url = "")
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }


    /**
     * Redirect to given route
     */
    public function callUrl($route = '') 
    {
        header("location: " . $this->configuration->get('url.root') . $route);
        exit();
    }
}
