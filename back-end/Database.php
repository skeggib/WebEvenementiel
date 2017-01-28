<!-- 
Database.php
Vuillemin Anthony
 -->

<?php
    
    /**
     * Connexion with a dabatase, allow to execute SQL queries
     */
    class Database // TODO: Rename to PgDatabase or allow to use other types of database (MySQL, ...)
    {
        private $_link;

        /**
         * Default constructor
         *
         * @param      string  $host      Hostname
         * @param      string  $username  Username
         * @param      string  $password  Password
         * @param      string  $db        Database name
         */
        public function __construct($host, $username, $password, $db)
        {
            $this->link = pg_connect('host='.$host.' dbname='.$db.' user='.$username.' password='.$password)  
            or die('Couldn\'t connect : '.pg_last_error());
            
        }

        public function __destruct()
        {
            pg_close($this->link)
            or die('Couldn\'t disconnect Database : '.pg_last_error());
        }

        /**
         * Execute a SQL query
         *
         * @param      string  $query  SQL query
         *
         * @return     resource  Result of the query
         */
        public function query($query)
        {
            $result = pg_query($query)
            or die('Query failed : '.pg_last_error());
            return $result;
        }
    }
?>
