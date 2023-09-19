<?php
abstract class Product
{
    public string $name;
    public float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getInfo();
}

class PhysicalProduct extends Product
{
    private float $weight;

    public function __construct(string $name, float $price, float $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }

    public function getInfo()
    {
        echo "Product Name: " . $this->name . "\n";
        echo "Product Price: " . $this->price . "\n";
        echo "Product Weight: " . $this->weight . "\n";
    }
}

class DigitalProduct extends Product
{
    private string $downloadLink;

    public function __construct(string $name, float $price, string $downloadLink)
    {
        parent::__construct($name, $price);
        $this->downloadLink = $downloadLink;
    }

    public function getInfo()
    {
        echo "Product Name: " . $this->name . "\n";
        echo "Product Price: " . $this->price . "\n";
        echo "Download Link: " . $this->downloadLink . "\n";
    }
}

$phycialProduct = new PhysicalProduct("Book", 20, 2);
$degitalProduct = new DigitalProduct("Movie", 40 , "netflix.com");
$phycialProduct->getInfo();
$degitalProduct->getInfo();