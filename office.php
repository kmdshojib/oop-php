<?php

use Employee as GlobalEmployee;

abstract class Employee
{
    protected string $name;
    protected string $id;

    public function __construct(string $name, string $id)
    {
        $this->name = $name;
        $this->id = $id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getID(): string
    {
        return $this->id;
    }
    abstract public function getDetails(): string;
}

class Manager extends Employee
{
    private string $department;
    private int $baseSalary;

    public function __construct(string $name, string $id, string $department, int $baseSalary)
    {
        parent::__construct($name, $id);
        $this->department = $department;
        $this->baseSalary = $baseSalary;
    }
    public function calculateSalary(): float
    {
        return $this->baseSalary * .20;
    }
    public function getDetails(): string
    {
        $details = "Name: {$this->getName()}\nId: {$this->getId()}\nDepartment: {$this->department}\nSalary: \${$this->calculateSalary()}\n";
        return $details;
    }
}

class Worker extends Employee
{
    private float $hourlyRate;
    private float $hoursWorked;

    public function __construct(string $name, string $id, float $hourlyRate, float $hoursWorked)
    {
        parent::__construct($name, $id);
        $this->hourlyRate = $hourlyRate;
        $this->hoursWorked = $hoursWorked;
    }
    public function calculateSalary(): float
    {
        $salary = $this->hourlyRate * $this->hoursWorked;
        return $salary;
    }
    public function getDetails(): string
    {
        $details = "Name: {$this->getName()}\nId: {$this->getId()}\nSalary: \${$this->calculateSalary()}";
        return $details;
    }
}

$salseManager = new Manager("John Snow", "39Xd4F", "Salse Department", 9000);
$slaseWorker = new Worker("John Doe", "49xzf5", 20.5, 16);

echo $salseManager->getDetails();
echo $slaseWorker->getDetails();
