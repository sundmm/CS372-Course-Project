<?php
    function connect_to_db()
    {
        define("USER", "db_project_user");
        define("PASS", "password");
        define("DB", "project_db");
        $connection = new mysqli('localhost', USER, PASS, DB);
        if ($connection->connect_error) {
            die('Connect Error (' . $connection->connect_errno . ') '
                . $connection->connect_error);
        }
        
        return $connection;   
    }
?>
