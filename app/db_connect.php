<?php

/**
 * A class file to connect to database
 */
class DB_Connect {
 
    // constructor
    function __construct() {
        // connecting to database
        //$this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        //$this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        include('db_config.php');
 
        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE); 
		//$con = mysqli_connect('localhost', 'root', '', 'sym');///hinal changed
        // returing connection cursor
        return $con;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysql_close();
    }
 
}
 
?>