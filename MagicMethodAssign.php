<?php
class Person
{
    protected string $name;
    protected int $age;
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}
class Student extends Person
{
    private string $class;
    private string $school;
    private string $course;

    public function __construct(string $name, int $age, string $class, string $school, string $course)
    {
        parent::__construct($name, $age);
        $this->class = $class;
        $this->school = $school;
        $this->course = $course;
    }
    public function getData(): array
    {
        return [$this->name, $this->age, $this->class, $this->school, $this->course];
    }
}

$student = new Student("John", 15, "Twelve", "ABCD", "Psychology");
print_r($student->getData());
