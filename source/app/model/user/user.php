<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace app\model\user;

use base;

class User extends base\model
{

    protected $fieldSet = array(
        'id' => 0,
        'firstname' => '',
        'insertion' => '',
        'surname' => '',
        'email' => '');

    protected $values = array();

}
