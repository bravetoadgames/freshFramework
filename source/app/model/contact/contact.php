<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace app\model\contact;

use base;

class Contact extends base\model
{

    /**
     * @var array
     */
    protected $fieldSet = array(
        'id' => 0,
        'firstname' => '',
        'insertion' => '',
        'surname' => '',
        'email' => '',
        'message' => '',
        'dateSent' => '',
        'ipAddress' => ''
    );

    protected $values = array();

}
