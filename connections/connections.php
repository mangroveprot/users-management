<?php 
    function connections() {
        $host = "localhost";
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "dbtambayanlist";
        
        $connection = new mysqli($host, $username, $password,$database);
        
        if($connection->connect_error) {
            echo $connection->connect_error;
        }else {
            return $connection;  
        }

    }
