<?php
    /* Database
    ** Created by VUILLEMIN Anthony
    */
    class Database
    {
        private $_link;

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

        public function query($query)
        {
            $result = pg_query($query)
            or die('Query failed : '.pg_last_error());
            return $result;
        }
    }
?>
