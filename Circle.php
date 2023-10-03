<?php
abstract class Shape
{
    private string $name;
    private string $color;

    public function __construct(string $color, string $name)
    {
        $this->name = $name;
        $this->color = $color;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    abstract protected function getArea(): float;
}

class Circle extends Shape
{
    private float $radius;
    public function __construct(float $radius, string $color, string $name)
    {
        $this->radius = $radius;
        parent::__construct($color, $name);
    }
    public function getArea(): float
    {
        $area = ($this->radius * $this->radius) * pi();
        return $area;
    }
}

class Rectangle extends Shape
{
    private float $width;
    private float $height;

    public function __construct(float $width, float $height, string $color, string $name)
    {
        $this->width = $width;
        $this->height = $height;
        parent::__construct($color, $name);
    }
    public function getArea(): float
    {
        $area = $this->width * $this->height;
        return $area;
    }
}

$circle = new Circle(10.4, "Blue", "Circle");
$rectebgale = new Rectangle(10, 30, "Red", "Rectangle");

echo "Circle Area: {$circle->getArea()}\n";
echo "RectangleArea: {$rectebgale->getArea()}\n";
echo "Name: {$circle->getName()}\n";
$circle->setName("Blue-Cricle");
echo "Name: {$circle->getName()}\n";
