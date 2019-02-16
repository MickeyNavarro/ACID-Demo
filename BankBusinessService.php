<?php
require_once 'Autoloader.php';

class BankBusinessService
{
    function getCheckingBalance() {
        //get a database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        //get the checking balance
        $checkingService = new CheckingAccountDataService($conn);
        $balance = $checkingService->getBalance();
        
        //close the database connection
        $conn->close();
        
        return $balance;
    }
    
    function getSavingBalance() {
        //get a database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        //get the saving balance 
        $savingService = new SavingAccountDataService($conn);
        $balance = $savingService->getBalance();
        
        //close the database connection
        $conn->close();
        
        return $balance;
    }
    
    //method to show the demo of ACID transaction
    function transaction() {
        
        //this method is missing a try-catch block just in case for axceptions are thrown 
        
        //get a database connecton
        $db = new Database();
        $conn = $db->getConnection();
        
        //turn off auto-commit so we can run an atomic database transaction and start a transaction
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        //get $100 from the checking account
        $checkingBalance = $this->getCheckingBalance();
        $checking = new CheckingAccountDataService($conn); 
        $okChecking = $checking->updateBalance($checkingBalance - 100);
        
        //add $100 from the saving account
        $savingBalance = $this->getSavingBalance();
        $savings = new SavingAccountDataService($conn);
        $okSaving = $savings->updateBalance($savingBalance + 100);
        
        //if update fromthe checking and saving were both 1 then commit the transacton else rollback the transaction 
        if ($okChecking && $okSaving) {
            $conn->commit();
        }
        else {
            $conn->rollback();
        }
        
        //close the database connection
        $conn->close(); 
    }
    
}

