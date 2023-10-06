<?php
abstract class Animal
{
    private string $name;
    private int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
    abstract public function makeSound(): string;
}

class Cat extends Animal
{
    private string $color;

    public function __construct(string $name, int $age, string $color)
    {
        parent::__construct($name, $age);
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }
    public function makeSound(): string
    {
        return "Meow!";
    }
}

class Dog extends Animal
{
    private string $breed;
    public function __construct(string $name, int $age, string $breed)
    {
        parent::__construct($name, $age);
        $this->breed = $breed;
    }

    public function getBreed(): string
    {
        return $this->breed;
    }
    public function makeSound(): string
    {
        return "Woof!";
    }
}

$cat = new Cat("Leo", 1, "white");
$dog = new Dog("Cairo", 2, "Hybrid");

echo "{$cat->getName()} is {$cat->getAge()} years old! is calling {$cat->makeSound()}\n";
echo "{$dog->getName()} is {$dog->getAge()} years old! is calling {$dog->makeSound()}\n";
