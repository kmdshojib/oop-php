<?php
abstract class Course
{
    protected string $course;
    protected float $price;

    public function __construct(string $course, float $price)
    {
        $this->course = $course;
        $this->price = $price;
    }
    abstract protected function getDetails();
}
interface Purchasable
{
    public function applyDiscount($percentage);
    public function getPriceAfterDiscount();
}

class VideoCourse extends Course implements Purchasable
{
    private int $duration;
    private float $discountPercentage = 0.0;
    public function __construct(string $course, float $price, int $duration)
    {
        parent::__construct($course, $price);
        $this->duration = $duration;
    }
    public function applyDiscount($percentage)
    {
        $this->discountPercentage = $percentage;
        if ($percentage > 0) {
            $discount = $this->price * ($percentage / 100);
            return $discount;
        } else {
            return 0;
        }
    }
    public function getPriceAfterDiscount()
    {
        $discountedPrice = $this->price - $this->applyDiscount($this->discountPercentage);
        return "Discounted Price:\${$discountedPrice}";
    }
    public function getDetails()
    {
        $details = "Course: {$this->course}\nPrice: \${$this->price}\nDuration: {$this->duration}hrs\n";
        return $details;
    }
}
class TextCourse extends Course implements Purchasable
{
    private int $pages;
    private float $discountPercentage = 0.0;
    public function __construct(string $course, float $price, int $pages)
    {
        parent::__construct($course, $price);
        $this->pages = $pages;
    }
    public function applyDiscount($percentage)
    {
        $this->discountPercentage = $percentage;
        if ($percentage > 0) {
            $discount = $this->price * ($percentage / 100);
            return $discount;
        } else {
            return 0;
        }
    }
    public function getPriceAfterDiscount()
    {
        $discountedPrice = $this->price - $this->applyDiscount($this->discountPercentage);
        return "Discounted Price:\${$discountedPrice}";
    }
    public function getDetails()
    {
        $details = "Course: {$this->course}\nPrice: \${$this->price}\nTotal Pages: {$this->pages}\n";
        return $details;
    }
}

$videoCourse = new VideoCourse("PHP", 100.0, 10);
$textCourse = new TextCourse("Laravel", 90.65, 10);
$textCourse->applyDiscount(5);

$videoCourse->applyDiscount(10);

echo $textCourse->getDetails();
echo $textCourse->getPriceAfterDiscount() . "\n";
echo $videoCourse->getDetails();
echo $videoCourse->getPriceAfterDiscount();
