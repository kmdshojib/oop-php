<?php
abstract class BankAccount
{
    protected string $accountNumber;
    protected string $accountHolder;
    protected float $balance;

    public function __construct(string $accountNumber, string $accountHolder, float $balance)
    {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
    }

    public function deposit(float $ammount)
    {
        return $this->balance += $ammount;
    }
    public function withdraw(float $ammount)
    {
        return $this->balance - $ammount;
    }
}

interface AccountInfo
{
    public function getAccountNumber(): string;
    public function getAccountHolder(): string;
    public function getBalance(): float;
}

class SavingsAccount extends BankAccount implements AccountInfo
{
    private int $interestRate;

    public function __construct(string $accountNumber, string $accountHolder, float $balance, int $interestRate)
    {
        parent::__construct($accountNumber, $accountHolder, $balance);
        $this->interestRate = $interestRate;
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
    public function calculateInterest()
    {
        $rate = $this->interestRate / 100;
        return $this->balance * $rate;
    }

}

class CheckingAccount extends BankAccount implements AccountInfo
{
    private float $overdraftLimit;

    public function __construct(string $accountNumber, string $accountHolder, float $balance, float $overdraftLimit)
    {
        parent::__construct($accountNumber, $accountHolder, $balance);
        $this->overdraftLimit = $overdraftLimit;
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

    public function isOverdraftAllowed(float $ammount)
    {
        if ($this->overdraftLimit <= $ammount) {
            return true;
        } else {
            return false;
        }
    }
}

$savingsAccount = new SavingsAccount("Sv10045", "John Wick", 900, 10);
$savingsAccount->deposit(500.60);
$savingsAccount->withdraw(40.90);
$interestEarned = $savingsAccount->calculateInterest();
echo "Savings Account Balance: \${$savingsAccount->getBalance()}\n";
echo "Interest Earned: \${$interestEarned}\n\n";

$checkingAccount = new CheckingAccount("CV10095", "Baba Yaga", 900, 300);
$checkingAccount->deposit(4000);
$checkingAccount->withdraw(300.60);
$withdrawAllowed = $checkingAccount->isOverdraftAllowed(600);
echo "Checking Account Balance: \${$checkingAccount->getBalance()}\n";
echo "Is Overdraft Allowed?" . ($withdrawAllowed ? "Yes" : "No") . "\n";