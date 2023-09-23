<?php

abstract class Product
{
    protected string $name;
    protected float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    abstract protected function getTotalPrice(): float;
}

class PhysicalProduct extends Product
{
    protected int $quantity;

    public function __construct(string $name, float $price, int $quantity)
    {
        parent::__construct($name, $price);
        $this->quantity = $quantity;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getTotalPrice(): float
    {
        return $this->price * $this->quantity;
    }

}
class DigitalProduct extends Product
{
    protected int $quantity;

    public function __construct(string $name, float $price, int $quantity)
    {
        parent::__construct($name, $price);
        $this->quantity = $quantity;
    }
    public function getQuantity(): int
    {
        return $this->quantity;
    }
    public function getTotalPrice(): float
    {
        return $this->price * $this->quantity;
    }

}

class Inventory
{
    private array $products = [];
    public function addProduct(Product $product)
    {
        $productName = $product->getName();
        if (!isset($this->products[$productName])) {
            $this->products[$productName] = $product;
        } else {
            $existingProduct = $this->products[$productName];
            $existingProduct->quantity += $product->quantity;
        }
    }
    public function updateProduct(string $productName, int $newQuantity)
    {
        if (isset($this->products[$productName])) {
            $product = $this->products[$productName];
            $product->quantity = max(0, $newQuantity);
        }
    }
    public function listProducts()
    {
        foreach ($this->products as $product) {
            echo "Product Name: {$product->getName()}\n";
            echo "Quantity: {$product->getQuantity()}\n";
            echo "Price: \${$product->getPrice()}\n";
            echo "Total Price: \${$product->getTotalPrice()}\n";
            echo "-----------------------------\n";
        }
    }

    public function calculateTotalValue(): float
    {
        $totalValue = 0.0;
        foreach ($this->products as $product) {
            $totalValue += $product->getTotalPrice();
        }
        return $totalValue;
    }
}

$psycialProduct = new PhysicalProduct("Laptop", 1000, 4);
$digitalProduct = new DigitalProduct("Adobe Photoshop", 999.99, 8);
$inventory = new Inventory();
$inventory->addProduct($psycialProduct);
$inventory->addProduct($digitalProduct);

$inventory->listProducts();
echo "Total Inventory Value: \${$inventory->calculateTotalValue()}\n";