<?php
abstract class Product
{
    protected string $name;
    protected float $price;
    protected int $quantity;

    public function __construct(string $name, float $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function __toString()
    {
        return "Product:{$this->name}\nPrice:{$this->price} \nQuantity:{$this->quantity}";
    }
}

interface Discountable
{
    public function applyDiscount(float $percentage);
}
class CartItem extends Product implements Discountable
{
    private float $discountedPercentage = 0.0;
    public function __construct(string $name, float $price, int $quantity)
    {
        parent::__construct($name, $price, $quantity);
    }

    public function applyDiscount(float $percentage)
    {
        $discounted = $this->price -= $this->price * $percentage / 100;
        return $discounted;
    }

    public function __toString()
    {
        return  parent::__toString() . "\nDiscounted Price:{$this->applyDiscount($this->discountedPercentage)}";
    }
    public function __get($property)
    {
        if (isset($property)) {
            $this->name = $property;
            $this->price = $property;
        }
        return null;
    }
    public function __set($property, $value)
    {
        $this->$property = $value;
    }
}

$cartItem = new CartItem("Bike", 1000.0, 1);
$cartItem->applyDiscount(10);
$cartItem->name = "BMW";
$cartItem->price = 1200;
echo $cartItem;
