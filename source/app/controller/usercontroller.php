<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace app\controller;

use \app\model\user\user;
use \base;

class UserController extends base\controller
{

    protected $db = null;

    function __construct($db = null)
    {
        $this->db = $db;
    }

    /**
     * Get all user records
     * @return array
     */
    public function getAll()
    {
        $result = $this->db->query('SELECT * FROM user ORDER BY surname ASC, firstname ASC');
        if ($result) {
            return $this->fetchData($result);
        }
        return false;
    }

    /**
     * Get all DB data and store in array
     * @param object $result
     * @return array
     */
    protected function fetchData($result)
    {
        $data = array();
        foreach ($result as $row) {
            $data[] = $this->setDataToObject(new User(), $row);
        }
        return $data;
    }

    public function save($user)
    {
        if ($user->isNew()) {
            return $this->insert($user);
        }
        return $this->update($user);
    }

    /**
     * Insert user record
     * @param type $user
     * @return type
     */
    protected function insert($user)
    {
        $query = "
            INSERT INTO
                user
            (firstname,
             insertion,
             surname,
             email)
            VALUES
            (#firstname, 
             #insertion,
             #surname,
             #email)
            ";

        $this->db->query($query, $this->setObjectToData($user));

        return $this->db->getInsertId();
    }

}
