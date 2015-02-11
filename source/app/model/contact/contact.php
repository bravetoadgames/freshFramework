<?php

/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace app\model\contact;

use base;

class Contact extends base\model {

    /**
     * @var array
     */
    protected $fieldSet = array('id', 'firstname', 'insertion', 'surname', 'email', 'message', 'date_sent', 'ip_address');
    protected $values = array();

}
