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

use \app\model\contact\contact;
use \app\model\user\user;
use \base;

class ContactController extends base\controller
{

    protected $db = null;

    function __construct($db = null)
    {
        $this->db = $db;
    }

    /**
     * Get all contact records
     * @return array
     */
    public function getAll()
    {
        $result = $this->db->query('SELECT * FROM contact ORDER BY date_sent DESC');
        if ($result) {
            return $this->fetchData('Contact', $result);
        }
        return false;
    }

    /**
     * @param object $contact
     * @return int
     */
    public function save($contact)
    {
        if ($contact->isNew()) {
            return $this->insert($contact);
        }
        return $this->update($contact);
    }

    /**
     * Insert contact record
     * @param object $contact
     * @return int
     */
    protected function insert($contact)
    {
        $query = "
            INSERT INTO
                contact
            (firstname,
             insertion,
             surname,
             email,
             message,
             date_sent,
             ip_address)
            VALUES
            (#firstname, 
             #insertion, 
             #surname, 
             #email, 
             #message,
             #date_sent, 
             #ip_address)
            ";

        $this->db->query($query, $this->setObjectToData($contact));

        return $this->db->getInsertId();
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
            $data[] = $this->setDataToObject(new Contact(), $row);
        }
        return $data;
    }

}
