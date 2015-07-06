<?php

namespace Deck\Framework\SqlRepository;

use Deck\Framework\DatabaseClientInterface;

class PdoClient implements DatabaseClientInterface
{

    public function __construct(array $options = null)
    {
        if ($options) {
            $this->connect($options);
        }
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function connect(array $options = null)
    {
        $dsn = $options['dsn'];
        $user = $options['user'];
        $password = $options['password'];
        $this->connection = new \PDO($dsn, $user, $password);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function disconnect()
    {
        // unset($this->connection);
        $this->connection = null;
    }

    public function fetch($query, array $bind)
    {

    }

    public function fetchRow($query, array $bind)
    {

    }

    public function insert($data)
    {
        $fields = implode(',', array_keys($data));
        $replacement = rtrim(str_repeat('?,', count($fields)), ',');
        $bind = array_values($data);
        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$replacement})";
        $this->query($sql, $bind);
        return $this->getLastInsertId();
    }

    public function insertUpdateMultiple()
    {
        
    }

    public function query($query, array $bind)
    {
        $statement = $this->connection->prepare($query);
        return $statement->execute($bind);
    }

    public function exec($query)
    {
        return $this->connection->exec($bind);
    }

    public function getLastInsertId()
    {
        return \PDO::LAST_INSERT_ID;
    }
}
