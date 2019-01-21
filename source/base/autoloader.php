<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

function baseAutoload($class)
{
    require_once(strtolower(str_replace("\\", "/", $class) . '.php'));
}

spl_autoload_register('baseAutoload');

