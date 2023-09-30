<?php
class Product
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
}

class Cart
{
    private array $items = [];

    public function addProduct(Product $product, int $quantity)
    {
        if ($quantity <= 0) {
            return;
        }

        $productName = $product->getName();

        if (isset($this->items[$productName])) {
            $this->items[$productName]->quantity += $quantity;
        } else {
            $this->items[$productName] = (object)['product' => $product, 'quantity' => $quantity];
        }
    }

    public function removeProduct(string $productName)
    {
        if (isset($this->items[$productName])) {
            unset($this->items[$productName]);
        }
    }

    public function calculateTotalPrice(): float
    {
        $totalPrice = 0.0;
        foreach ($this->items as $item) {
            $totalPrice += $item->product->getPrice() * $item->quantity;
        }
        return $totalPrice;
    }

    public function displayCart()
    {
        echo "Items in Cart:\n";
        foreach ($this->items as $item) {
            echo "{$item->product->getName()} ({$item->quantity} x \${$item->product->getPrice()})\n";
        }
        echo "Total Price: \${$this->calculateTotalPrice()}\n";
    }
}

$product1 = new Product("Product A", 10.0);
$product2 = new Product("Product B", 15.0);

$cart = new Cart();

$cart->addProduct($product1, 2);
$cart->addProduct($product2, 1);

$cart->displayCart();
