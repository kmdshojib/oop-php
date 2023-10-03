<?php

use BankAccount as GlobalBankAccount;

abstract class BankAccount
{
    private string $accountNumber;
    private string $accountHolder;
    private float $balance;
    public function __construct(string $accountNumber, string $accountHolder, float $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
    }
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }
    public function getAccountHolder(): string
    {
        return $this->accountHolder;
    }
    public function getBalance(): float
    {
        return $this->balance;
    }
    public function deopsit(float $ammount): void
    {
        $this->balance += $ammount;
    }
    public function withdraw(float $ammount): bool
    {
        if ($this->balance <= 0) {
            throw new Exception("Insufficient balance");
            return false;
        } else {
            $this->balance -= $ammount;
            return true;
        }
    }
    public function setBalance(float $ammount)
    {
        $this->balance = $ammount;
    }
}

class SavingsAccount extends BankAccount
{
    private float $interestRate;
    public function __construct(string $accountNumber, string $accountHolder, float $balance, float $interestRate)
    {
        parent::__construct($accountNumber, $accountHolder, $balance);
        $this->interestRate = $interestRate;
    }
    public function applyInterest(): void
    {
        $interest = $this->getBalance() * ($this->interestRate / 100);
        $totalBalace = $interest + $this->getBalance();
        $this->setBalance($totalBalace);
    }
}

class CheckingAccount extends BankAccount
{
    private float $monthlyFee;

    public function __construct(string $accountNumber, string $accountHolder, float $balance, float $monthlyFee)
    {
        parent::__construct($accountNumber, $accountHolder, $balance);
        $this->monthlyFee = $monthlyFee;
    }

    public function deductMonthlyFee(): void
    {
        if ($this->balance >= $this->monthlyFee) {
            $this->balance -= $this->monthlyFee;
        }
    }
}

$SavingsAccount = new SavingsAccount("2323", "John", 1000, 10);

echo "Interest: {$SavingsAccount->applyInterest()}\n";
echo "Total Balance: {$SavingsAccount->getBalance()}\n";
echo $SavingsAccount->withdraw(100) ? "Withdraw: Successfull!\nCurrentBalance:{$SavingsAccount->getBalance()}" : "Not enough funds";
