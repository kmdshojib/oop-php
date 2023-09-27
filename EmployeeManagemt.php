<?php
abstract class Employee
{
    protected string $name;
    protected string $id;

    public function __construct(string $name, string $id)
    {
        $this->name = $name;
        $this->id = $id;
    }
    public function __toString()
    {
        return "Employee-Name:{$this->name} \nEmployee-Id:{$this->id} \n";
    }
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

    public function calculateSalary()
    {
        $bonus = 0.20;
        $calcluateSalary = ($this->baseSalary * $bonus) + $this->baseSalary;
        return $calcluateSalary;
    }

    public function getInfo()
    {
        return parent::__toString() . "Department: {$this->department} \nSalary: {$this->calculateSalary()}";
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

    public function calculateSalary()
    {
        if ($this->hoursWorked > 40) {
            $rate = $this->hourlyRate * 1.5;
            return $this->hoursWorked * $rate;
        } else {
            return $this->hoursWorked * $this->hourlyRate;
        }
    }
    public function getInfo()
    {
        return parent::__toString() . "Hourly Rate:{$this->hourlyRate}\nHours Worked:{$this->hoursWorked}\nTotal Salary:{$this->calculateSalary()}";
    }
}
$manager = new Manager("John", "HX9400", "HR", 4000);
$worker = new Worker("Smith", "RX3400", 40, 50);

echo $manager->getInfo();
echo $worker->getInfo();