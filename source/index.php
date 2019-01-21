<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

session_start();
/**
 * Load default class libraries
 */
require_once('base/kint/Kint.class.php');                   // Test output
require_once('base/autoloader.php');                        // Autoloader

use base\application;

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('BDS') ? null : define('BDS', "\\");
defined('ROOT') ? null : define('ROOT', __DIR__);


/**
 * Generate application
 */
$application = new application();
