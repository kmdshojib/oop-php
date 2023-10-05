<?php
abstract class ElectronicDevice
{
    private string $brand;
    private string $model;
    private float $price;

    public function __construct(string $brand, string $model, float $price)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getModel(): string
    {
        return $this->model;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
    abstract public function getDetails(): string;
}

class SmartPhone extends ElectronicDevice
{
    private float $screenSize;

    public function __construct(string $brand, string $model, float $price, float $screenSize)
    {
        parent::__construct($brand, $model, $price);
        $this->screenSize = $screenSize;
    }
    public function getDetails(): string
    {
        $details = "Brand:{$this->getBrand()}\nModel:{$this->getModel()}\nPrice:\${$this->getprice()}\nScreen Size:{$this->screenSize}\n";
        return $details;
    }
}

class Laptop extends ElectronicDevice
{
    private string $processor;

    public function __construct(string $brand, string $model, float $price, string $processor)
    {
        parent::__construct($brand, $model, $price);
        $this->processor = $processor;
    }
    public function getDetails(): string
    {
        $details = "Brand:{$this->getBrand()}\nModel:{$this->getModel()}\nPrice:\${$this->getprice()}\nProssessor:{$this->processor}\n";
        return $details;
    }
}
$smasungPhone = new SmartPhone("Samsung", "S23", 1100, 6.7);
$asusLaptop = new Laptop("Asus", "G15", 2400, "i9");
echo "Smartphone:\n";
echo $smasungPhone->getDetails() . "\n";

echo "Laptop:\n";
echo $asusLaptop->getDetails() . "\n";
