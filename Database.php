<?php
class Database { 
    //credentials for accessing the database 
    private $dbservername = "localhost"; 
    private $dbusername = "root"; 
    private $dbpassword = "root"; 
    private $dbname = "ACID_DEMO"; 
    
    function getConnection() { 
        //get and check the connection 
        $conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname); 
        if ($conn->connect_error) { 
            die("Connection failed:" . $conn->connect_error); 
        }
        return $conn; 
    }
}