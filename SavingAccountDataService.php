<?php
require_once 'Autoloader.php';
class SavingAccountDataService { 
    
    private $conn; 
    
    public function __construct(mysqli $conn) { 
        $this->conn = $conn; 
    }
    
    function getBalance() { 
        //run query to get balance 
        $sql = "SELECT BALANCE FROM SAVING"; 
        $result = $this->conn->query($sql); 
        if($result->num_rows == 0) { 
            return -1; 
        }
        else { 
            $row = $result->fetch_assoc(); 
            $balance = $row["BALANCE"]; 
            return $balance; 
        }
    }
    function updateBalance($balance) { 
        //run query to update balance
        $sql = "UPDATE SAVING SET BALANCE = $balance";
        if($this->conn->query($sql) == TRUE) {
            return 1;
        }
        else {
            return 0; 
        }
    }
}