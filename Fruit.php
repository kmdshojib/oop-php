<?php

abstract class Fruit
{
    private string $name;
    private string $color;
    private string $taste;

    public function __construct(string $name, string $color, string $taste)
    {
        $this->name = $name;
        $this->color = $color;
        $this->taste = $taste;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getTaste(): string
    {
        return $this->taste;
    }
    abstract protected function isTasty(): bool;
}
interface Edible
{
    public function eat(): string;
}

class Apple extends Fruit implements Edible
{
    private string $varity;

    public function __construct(string $name, string $color, string $taste, string $variety)
    {
        parent::__construct($name, $color, $taste);
        $this->varity = $variety;
    }
    public function getVarity(): string
    {
        return $this->varity;
    }

    public function isTasty(): bool
    {
        if ($this->getTaste() === "sweet") {
            return true;
        } else {
            return false;
        }
    }
    public function eat(): string
    {
        return "{$this->getName()} {$this->getVarity()} is eating!\n";
    }
}

$apple = new Apple("Apple", "Red", "sweet", "Red Delicious");
echo "{$apple->getName()} {$apple->getColor()} {$apple->getTaste()} {$apple->getVarity()}\n";
echo $apple->eat();
echo $apple->isTasty() ? "{$apple->getName()} is tasty!" : "{$apple->getName()} is not Tasty";
