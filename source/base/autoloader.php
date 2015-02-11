<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

function baseAutoload($class)
{
    require_once(strtolower(str_replace("\\", "/", $class) . '.php'));
}

spl_autoload_register('baseAutoload');

