<?php
require_once 'Autoloader.php';

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);

/* 
//create a database connection
$db = new Database(); 
$conn = $db->getConnection(); 

//create instances of each DAO 
$checking = new CheckingAccountDataService($conn);
$saving = new SavingAccountDataService($conn);

//output the current balances
$checkBalance = $checking->getBalance();
$savingBalance = $saving->getBalance();
echo "Current values:<br>";
echo "Checking balance = " . $checkBalance . "<br>";
echo "Saving balance = " . $savingBalance . "<br>";

//uptdate the balances 
echo "Take $100 from checking and put it into savings<br>";
$checking->updateBalance($checkBalance - 100);
$saving->updateBalance($savingBalance + 100);

//output the new balances
$checkBalance = $checking->getBalance();
$savingBalance = $saving->getBalance();
echo "Current values:<br>";
echo "Checking balance = " . $checkBalance . "<br>";
echo "Saving balance = " . $savingBalance . "<br>";
*/

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


