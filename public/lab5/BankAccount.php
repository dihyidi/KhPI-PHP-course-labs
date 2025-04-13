<?php

require_once "AccountInterface.php";

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    protected $currency;

    function __construct($initialBalance, $currency) {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Initial balance is less than the minimum balance");
        }

        $this->balance = $initialBalance;
        $this->currency = $currency;
    }    

    public function deposit($amount) {
        if ($amount < 0) {
            throw new Exception("Deposit amount cannot be negative");
        }

        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount > $this->balance) {
            throw new Exception("Withdraw amount cannot be greater than balance");
        }

        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance . " " . $this->currency;
    }
}