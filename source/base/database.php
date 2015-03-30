<?php
/*
 * FreshFramework
 * written by Arjen Schumacher
 * 2015
 * -----------------------------------
 * e-mail:  arjen.schumacher@gmail.com
 * twitter: @onkelarie
 */

namespace Base;

class Database
{

    protected $configuration = null;

    protected $result = null;

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
     * Make connection with configured database
     */
    private function connect()
    {
        $this->db = mysqli_connect(
            $this->configuration->get('db.host'), $this->configuration->get('db.username'), $this->configuration->get('db.password'), $this->configuration->get('db.name')
        );
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
        $this->queries[] = $query;
        $result = mysqli_query($this->db, $query);
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
            while ($row = mysqli_fetch_assoc($result)) {
                $this->result[] = $row;
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

    public function getInsertId()
    {
        return mysqli_insert_id($this->db);
    }

    public function showQueries()
    {
        return $this->queries;
    }

}
