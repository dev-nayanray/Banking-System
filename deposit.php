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
    $amount = $_POST['amount'];

    $account = $bank->getAccount($accountNumber);
    if ($account) {
        $account->deposit($amount);
        $bank->updateAccount($account);
        echo "Deposit successful. New balance: $" . $account->getBalance();
    } else {
        echo "Account not found.";
    }
}

$conn->close();
?>
<div class="modal fade" id="depositModal" tabindex="-1" aria-labelledby="depositModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="depositModalLabel">Deposit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="depositForm" action="deposit.php" method="POST">
                    <div class="mb-3">
                        <label for="depositAccountNumber" class="form-label">Account Number</label>
                        <input type="text" class="form-control" id="depositAccountNumber" name="accountNumber" required>
                    </div>
                    <div class="mb-3">
                        <label for="depositAmount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="depositAmount" name="amount" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Deposit</button>
                </form>
            </div>
        </div>
    </div>
</div>