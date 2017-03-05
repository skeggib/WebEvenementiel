<?php

namespace WebEvent\Database;

/**
 * Connexion with a PostgreSQL database
 */
class PgDatabase
{
    private $_link;

    /**
     * @param      string  $host      Adresse
     * @param      string  $username  Login
     * @param      string  $password  Mot de passe
     * @param      string  $db        Nom de la base de donnees
     */
    public function __construct($host, $username, $password, $db)
    {
        $this->link = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$password)  
        or die('Couldn\'t connect to database : '.pg_last_error());
        
    }

    public function __destruct()
    {
        pg_close($this->link)
        or die('Couldn\'t disconnect from database : '.pg_last_error());
    }

    /**
     * Execute an SQL query
     *
     * @param      string  $query  Requete
     *
     * @return     resource  Resultat
     */
    public function query($query)
    {
        $result = pg_query($query)
        or die('Query failed : '.pg_last_error());
        return $result;
    }
}
