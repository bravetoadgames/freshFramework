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

use app\model\user\user;
use app\model\contact\contact;

class Controller
{

    /**
     * Fill object with data
     * @param object app\model\*
     * @param array $data
     */
    public static function setDataToObject($object, $data)
    {
        foreach ($object->getFieldSet() as $key => $value) {
            $object->set($key, $data[$key]);
        }
        return $object;
    }

    /**
     * @param object app\model\*
     * @return array
     */
    public static function setObjectToData($object)
    {
        $data = array();
        foreach ($object->getFieldSet() as $key => $value) {
            $data[$key] = $value;
        }
        foreach ($object->getFieldSet() as $key => $value) {
            if ($object->get($key) !== false) {
                $data[$key] = $object->get($key);
            }
        }
        return $data;
    }

}
