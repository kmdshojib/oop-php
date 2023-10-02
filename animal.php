<?php
abstract class Animal
{
    private string $name;
    private string $color;
    private int $age;

    public function __construct(string $name, string $color, int $age)
    {
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getAge()
    {
        return $this->age;
    }
    abstract protected function speak();
}
interface PEt
{
    public function play(): string;
}
class Dog extends Animal implements Pet
{
    private string $breed;

    public function __construct(string $name, string $color, int $age, string $breed)
    {
        parent::__construct($name, $color, $age);
        $this->breed = $breed;
    }

    public function getBreed()
    {
        return $this->breed;
    }
    public function speak()
    {
        return "{$this->getName()} Barks!\n";
    }
    public function play(): string
    {
        return "{$this->getName()} is Playing!\n";
    }
}

$germanDog = new Dog("Winter", "White", 2, "German Shepard");
echo $germanDog->speak();
echo $germanDog->play();
echo "Breed:{$germanDog->getBreed()}";