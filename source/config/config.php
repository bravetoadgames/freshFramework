<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

$config = new base\configuration();

// Subpath if application does not reside in root directory
$config->set('url.subdir', '');


// Application configuration
$config->set('app.language', 'en');
$config->set('app.mainTemplate', 'main');
$config->set('app.name', 'app');
$config->set('app.title', 'FreshFramework');

// Database configuration
$config->set('db.connector', 'PDO');        // PDO or mysqli
$config->set('db.host', 'localhost');
$config->set('db.username', 'root');
$config->set('db.password', '');
$config->set('db.name', 'freshframework');

$config->set('error.pageNotFound', 'You stumbled upon the end of the internet!');

$config->set('url.path', $_SERVER['DOCUMENT_ROOT'] . $config->get('url.subdir'));
$config->set('url.root', $config->get('url.subdir'));

// Visitor configuration
$config->set('ip.address.visitor', $_SERVER['REMOTE_ADDR']);

// Developer configuration
$config->set('dev.debug', false);
$config->set('dev.starttime', microtime());
$config->set('dev.version', '0.9.5');

if ($config->get('dev.debug') === true) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}
