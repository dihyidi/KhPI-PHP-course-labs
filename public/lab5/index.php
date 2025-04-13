<?php

require_once "BankAccount.php";
require_once "SavingsAccount.php";

echo "Banking system<br/><br/>";

try {
    echo "Invalid initial balance<br/>";
    $invalidAccount = new BankAccount(-1, "USD");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
}

try {
    $account1 = new BankAccount(100, "USD");
    echo "Account created. Balance: " . $account1->getBalance() . "<br/>";

    $account1->deposit(50);
    echo "Deposit for \$50: " . $account1->getBalance() . "<br/>";

    echo "<br/>Invalid deposit amount<br/>";
    $account1->deposit(-50);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
}

echo "<br/>Savings account<br/><br/>";

try {
    $savings = new SavingsAccount(500, "EUR");
    echo "Account created. Balance: " . $savings->getBalance() . "<br/>";

    $savings->applyInterest();
    echo "After applying interest: " . $savings->getBalance() . "<br/>";

    $savings->withdraw(30);
    echo "Withdrawal \$30: " . $savings->getBalance() . "<br/>";

    echo "<br/>Invalid withdrawal amount<br/>";
    $savings->withdraw(1000);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
}