<?php
require_once 'Autoloader.php';

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);


//get the BankBusinessService 
$service = new BankBusinessService(); 

//echo the initial balances
echo "Initial Checking Balance is " . $service->getCheckingBalance() . "<br>"; 
echo "Initial Saving Balance is " . $service->getSavingBalance() . "<br>";

//run the transaction
$service->transaction(); 

//output the new balances
echo "New Checking Balance is " . $service->getCheckingBalance() . "<br>";
echo "New Saving Balance is " . $service->getSavingBalance() . "<br>";


