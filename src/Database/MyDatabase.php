<?php

namespace WebEvents\Database;

require_once(__DIR__ . "/IDatabase.php");

/**
 * Connexion with a PostgreSQL database
 */
class MyDatabase implements IDatabase
{
    private $pdo;

    /**
     * @param      string  $host      Hostname
     * @param      string  $username  Login
     * @param      string  $password  Password
     * @param      string  $db        Database name
     */
    public function __construct($host, $db, $username, $password)
    {
        $this->pdo = new \PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    public function query($query)
    {
        return $this->pdo->query($query);
    }
}
