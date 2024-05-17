<?php
require_once 'Account.php';

class BankingSystem {
    private $accounts = array();

    public function __construct($dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function createAccount($accountNumber, $owner, $initialBalance) {
        $account = new Account($accountNumber, $owner, $initialBalance);
        $this->accounts[$accountNumber] = $account;

        $sql = "INSERT INTO accounts (accountNumber, owner, balance) VALUES ('$accountNumber', '$owner', '$initialBalance')";
        $this->dbConnection->query($sql);
    }

    public function getAccount($accountNumber) {
        if (isset($this->accounts[$accountNumber])) {
            return $this->accounts[$accountNumber];
        } else {
            $sql = "SELECT * FROM accounts WHERE accountNumber='$accountNumber'";
            $result = $this->dbConnection->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $account = new Account($row['accountNumber'], $row['owner'], $row['balance']);
                $this->accounts[$accountNumber] = $account;
                return $account;
            } else {
                return null;
            }
        }
    }
}
?>
