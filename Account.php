<?php
class Account {
    private $accountNumber;
    private $owner;
    private $balance;

    public function __construct($accountNumber, $owner, $balance) {
        $this->accountNumber = $accountNumber;
        $this->owner = $owner;
        $this->balance = $balance;
    }

    public function getAccountNumber() {
        return $this->accountNumber;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }
}
?>
