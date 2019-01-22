<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015-2019
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @arjenschumacher
 */

namespace Base;

use PDO;

class Database
{

    /**
     * site configuration
     * @var object
     */
    protected $configuration = null;

    /**
     * DB query
     * @var object 
     */
    protected $result = null;

    /**
     * executed query stack
     * @var array
     */
    protected $queries = array();

    /**
     * Class constructor
     * @param object $configuration
     */
    function __construct($configuration = null)
    {
        $this->configuration = $configuration;
        $this->connect();
    }

    /**
     * Make connection with configured database connector (PDO or mysqli)
     */
    private function connect()
    {
        if ($this->configuration->get('db.connector') == 'PDO') {
            $dsn = "mysql:host=" . $this->configuration->get('db.host') . ";dbname=" . $this->configuration->get('db.name');
            $options = array();
            $this->db = new PDO(
                $dsn, $this->configuration->get('db.username'), $this->configuration->get('db.password'), $options
            );
        } elseif ($this->configuration->get('db.connector') == 'mysqli') {
            $this->db = mysqli_connect(
                $this->configuration->get('db.host'), $this->configuration->get('db.username'), $this->configuration->get('db.password'), $this->configuration->get('db.name')
            );
        }
    }

    /**
     * Build DB query
     * @param string $query
     * @param array $values
     */
    public function query($query = '', $values = array())
    {
        $query = $this->replaceKeysWithValues($query, $values);
        $query = vsprintf($query, $values);
        $query = str_replace("#?#", "%", $query);       // Wildcard translation
        $this->queries[] = $query;

        if ($this->configuration->get('db.connector') == 'PDO') {
            $result = $this->db->query($query);
        } elseif ($this->configuration->get('db.connector') == 'mysqli') {
            $result = mysqli_query($this->db, $query);
        }

        return $this->getResult($result);
    }

    /**
     * Replace all # keys in a query with actual values
     * @param string $query
     * @param array $values
     * @return string
     */
    protected function replaceKeysWithValues($query, $values)
    {
        foreach ($values as $key => $value) {
            if (is_string($value)) {
                $query = str_replace("#" . $key, "\"" . $value . "\"", $query);
            } else {
                $query = str_replace("#" . $key, $value, $query);
            }
        }
        return $query;
    }

    /**
     * Set result rows
     * @param object $result
     */
    private function getResult($result = null)
    {
        $this->result = null;
        if (is_object($result)) {
            if ($this->configuration->get('db.connector') == 'PDO') {
                $this->result = $result;
            } elseif ($this->configuration->get('db.connector') == 'mysqli') {
                while ($row = mysqli_fetch_assoc($result)) {
                    $this->result[] = $row;
                }
            }
        }
        return $this->result;
    }

    /**
     * Make valid query values
     * @param array $values
     * @return string
     */
    private function normalizeQueryValues($values)
    {
        $queryValues = array();
        foreach ($values as $value) {
            if (is_string($value)) {
                $queryValues[] = "'" . mysqli_real_escape_string($this->db, $value) . "'";
            } else {
                $queryValues[] = mysqli_real_escape_string($this->db, $value);
            }
        }
        return $queryValues;
    }

    /**
     * Get last inserted ID
     * @return int
     */
    public function getInsertId()
    {
        if ($this->configuration->get('db.connector') == 'PDO') {
            return $this->db->lastInsertId();
        } elseif ($this->configuration->get('db.connector') == 'mysqli') {
            return mysqli_insert_id($this->db);
        }
        return 0;
    }

    /**
     * Return stack of executed queries
     * @return array
     */
    public function showQueries()
    {
        return $this->queries;
    }

}
