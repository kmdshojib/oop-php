<?php
abstract class Shape
{
    abstract function getArea(): float;
    abstract function getPerimeter(): float;
}

class Circle extends Shape
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getArea(): float
    {
        return pi() * $this->radius * $this->radius;
    }

    public function getPerimeter(): float
    {
        return 2 * $this->radius * pi();
    }
}
interface Calculatable
{
    public function calculateArea(): float;
    public function calculatePerimeter(): float;
}
class Rectangle implements Calculatable
{
    private float $length;
    private float $width;

    public function __construct(float $length, float $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea(): float
    {
        return $this->length * $this->width;
    }

    public function calculatePerimeter(): float
    {
        return 2 * ($this->length + $this->width);
    }
}

$circle = new Circle(3.44);
$rectengale = new Rectangle(3, 5);

echo $circle->getArea() . "\n";
echo $circle->getPerimeter() . "\n";

echo $rectengale->calculateArea() . "\n";
echo $rectengale->calculatePerimeter() . "\n";