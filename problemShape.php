<?php
abstract class Shape
{
    private string $color;
    public function __construct(string $color)
    {
        $this->color = $color;
    }
    public function getClolor(): string
    {
        return $this->color;
    }
    abstract public function getArea(): float;
}
interface Drawable
{
    public function draw(): string;
}
class Circle extends Shape implements Drawable
{
    private float $radius;

    public function __construct(string $color, float $radius)
    {
        parent::__construct($color);
        $this->radius = $radius;
    }
    public function getRadius(): float
    {
        return $this->radius;
    }
    public function getArea(): float
    {
        $area = ($this->getRadius() * $this->getRadius()) * pi();
        return $area;
    }
    public function draw(): string
    {
        $color = parent::getClolor();
        $details = "The {$color} Circle is Drawing with radius {$this->getRadius()} and total area is {$this->getArea()}\n";
        return $details;
    }
}
class Rectangle extends Shape implements Drawable
{
    private float $width;
    private float $height;
    public function __construct(string $color, float $width, float $height)
    {
        parent::__construct($color);
        $this->width = $width;
        $this->height = $height;
    }
    public function getWidth(): float
    {
        return $this->width;
    }
    public function getHeight(): float
    {
        return $this->height;
    }
    public function getArea(): float
    {
        $area = $this->getWidth() * $this->getHeight();
        return $area;
    }
    public function draw(): string
    {
        $color = parent::getClolor();
        $details = "The {$color} Rectangle is Drawing with width: {$this->getWidth()}, height: {$this->getHeight()} and total area is {$this->getArea()}\n";
        return $details;
    }
}

$circle = new Circle("Blue", 5);
$rectangle = new Rectangle("Green", 5, 5);
echo $circle->draw();
echo $rectangle->draw();
