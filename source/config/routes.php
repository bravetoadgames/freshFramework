<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

$routes = array(
    '' => array(
        'route' => 'home',
        'action' => 'home',
        'title' => 'home',
        'menu' => true
    ),
    '/information' => array(
        'route' => 'information',
        'action' => 'information',
        'title' => 'information',
        'menu' => true
    ),
    '/contact' => array(
        'route' => 'contact',
        'action' => 'contact',
        'title' => 'contact',
        'menu' => true
    ),
    '/user/overview' => array(
        'route' => 'user/overview',
        'action' => 'overview',
        'title' => 'user overview',
        'menu' => true
    ),
    '/test' => array(
        'route' => 'test',
        'action' => 'test',
        'title' => 'test',
        'menu' => true
    ),
    '/account/login' => array(
        'route' => 'account/login',
        'action' => 'login',
        'title' => 'account login',
        'menu' => false
    )
);
