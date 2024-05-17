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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST['accountNumber'];
    $owner = $_POST['owner'];
    $balance = $_POST['balance'];

    $bank->createAccount($accountNumber, $owner, $balance);

    echo "New account created successfully";
}

$conn->close();
?>
