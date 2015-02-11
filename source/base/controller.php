<?php

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
        foreach ($object->getFieldSet() as $key) {
            $object->setValue($key, $data[$key]);
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
        foreach ($object->getFieldSet() as $key) {
            $data[$key] = $object->getValue($key);
        }
        return $data;
    }

}
