<?php
$servername = "localhost";
$username = "root"; // Change this if your MySQL username is different
$password = ""; // Change this if your MySQL password is set
$dbname = "banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require_once 'BankingSystem.php';

$bank = new BankingSystem($conn);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $accountNumber = $_GET['accountNumber'];

    $account = $bank->getAccount($accountNumber);

    if ($account) {
        echo json_encode([
            'accountNumber' => $account->getAccountNumber(),
            'owner' => $account->getOwner(),
            'balance' => $account->getBalance()
        ]);
    } else {
        echo json_encode(['error' => 'Account not found']);
    }
}

$conn->close();
?>
