<?php
$servername = "localhost";
$username = "root"; // Change if your MySQL username is different
$password = ""; // Change if your MySQL password is set
$dbname = "banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once 'BankingSystem.php';

$bank = new BankingSystem($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST['accountNumber'];
    $rate = $_POST['rate'];

    $account = $bank->getAccount($accountNumber);
    if ($account) {
        $account->applyInterest($rate);
        $bank->updateAccount($account);
        echo "Interest applied. New balance: $" . $account->getBalance();
    } else {
        echo "Account not found.";
    }
}

$conn->close();
?>
