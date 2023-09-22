<?php
interface Discountable
{
    public function getDiscountPercentage(): float;
}
abstract class Product
{
    protected string $name;
    protected float $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function __toString(): string
    {
        return "Product: " . $this->name . "\n" . "Price: " . $this->price . "\n";
    }
    abstract protected function getInfo(): string;
    abstract protected function getDiscountedPrice(): float;
}

class PhysicalProduct extends Product implements Discountable
{
    private float $weight;
    private float $discountPercentage = 10;
    public function __construct(string $name, float $price, float $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }
    public function getDiscountedPrice(): float
    {
        $toalDiscount = ($this->price * $this->discountPercentage) / 100;
        return $this->price - $toalDiscount;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }
    public function setDiscountPercentage(float $value): void
    {
        $this->discountPercentage = $value;
    }
    public function getInfo(): string
    {
        return parent::__toString() . "Weight: " . $this->weight;
    }

}
class DigitalProduct extends Product implements Discountable
{
    private string $downloadLink;
    private float $discountPercentage = 10;
    public function __construct(string $name, float $price, string $downloadLink)
    {
        parent::__construct($name, $price);
        $this->downloadLink = $downloadLink;
    }
    public function getDiscountedPrice(): float
    {
        $toalDiscount = ($this->price * $this->discountPercentage) / 100;
        return $this->price - $toalDiscount;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }
    public function setDiscountPercentage(float $value): void
    {
        $this->discountPercentage = $value;
    }
    public function getInfo(): string
    {
        return parent::__toString() . "Download-Link: " . $this->downloadLink;
    }

}

$psycialPeoduct = new PhysicalProduct("Mouse", 500, 1);
$degitalProduct = new DigitalProduct("Movie", 100, "Scandiweb.com");

$psycialPeoduct->setDiscountPercentage(20.0);

echo "Psycial Product: \n" . $psycialPeoduct->getInfo() . "\n";
echo $psycialPeoduct->getDiscountedPrice();
echo "Digital Product: \n" . $degitalProduct->getInfo() . "\n";