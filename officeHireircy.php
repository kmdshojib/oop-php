<?php
class Employee
{
    protected string $name;
    protected string $id;
    protected float $salary;

    public function __construct(string $name, string $id, float $salary)
    {
        $this->name = $name;
        $this->id = $id;
        $this->salary = $salary;
    }
    public function getDetails(): string
    {
        $details = "Name: {$this->name}\nID:{$this->id}\nSalary: \${$this->salary}\n";
        return $details;
    }
}

class Manager extends Employee
{
    protected string $department;
    protected float $bonusPercentage;

    public function __construct(string $name, string $id, float $salary, string $department, float $bonusPercentage)
    {
        parent::__construct($name, $id, $salary);
        $this->department = $department;
        $this->bonusPercentage = $bonusPercentage;
    }
    public function calculateSalary(): float
    {
        $bonus = $this->salary * ($this->bonusPercentage);
        $salary = $this->salary + $bonus;
        return  $salary;
    }
    public function getDetails(): string
    {

        $details = parent::getDetails() . "Department:{$this->department}\nTotal Salary:\${$this->calculateSalary()}\n";
        return $details;
    }
}

class CEO extends Manager
{
    protected int $stockOptions;
    public function __construct(string $name, string $id, float $salary, string $department, float $bonusPercentage, int $stockOptions)
    {
        parent::__construct($name, $id, $salary, $department, $bonusPercentage);
        $this->stockOptions = $stockOptions;
    }
    public function getDetails(): string
    {
        $details = parent::getDetails() . "Stock Options:{$this->stockOptions}\n";
        return $details;
    }
}

$financeEmployee = new Employee("John", "5x901", 200);
$financeManager = new Manager("Smith", "5x900", 2000, "Finance", 20);
$financeCEO = new CEO("Steve", "20x100", 5000, "Finance", 10, 50);
echo "Employee:\n";
echo $financeEmployee->getDetails() . "\n";
echo "Manager:\n";
echo $financeManager->getDetails() . "\n";
echo "CEO:\n";
echo $financeCEO->getDetails();
