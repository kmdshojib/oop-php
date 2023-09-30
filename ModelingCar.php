<?php
abstract class Car
{
    protected string $make;
    protected string $model;
    protected int $year;
    protected string $color;

    public function __construct(string $make, string $model, int $year, string $color)
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
    }

    public function start(): string
    {
        return "The {$this->year} {$this->model} is now running.\n";
    }
    public function stop(): string
    {
        return "The {$this->year} {$this->model} has been stopped.\n";
    }

    abstract protected function dispalyInfo(): array;
}

class ElectricCar extends Car
{
    private float $batteryLevel;
    public function __construct(string $make, string $model, int $year, string $color, float $batteryLevel)
    {
        parent::__construct($make, $model, $year, $color);
        $this->batteryLevel = $batteryLevel;
    }
    public function dispalyInfo(): array
    {
        return [
            "Make" => $this->make,
            "Model" => $this->model,
            "Year" => $this->year,
            "Color" => $this->color,
            "Battery Level" => $this->batteryLevel
        ];
    }
}

$tesla = new ElectricCar("Tesla", "Cyber-Truck", 2024, "Gray", 100);

echo $tesla->start();
echo $tesla->stop();

print_r($tesla->dispalyInfo());
