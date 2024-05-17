<?php
// search_accounts.php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = $_GET['q'];
$sql = "SELECT accountNumber, owner, balance, loanAmount FROM accounts WHERE owner LIKE '%$query%' OR accountNumber LIKE '%$query%'";
$result = $conn->query($sql);

$accounts = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
}

echo json_encode($accounts);

$conn->close();
?>
