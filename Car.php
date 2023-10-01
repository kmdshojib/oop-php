<?php
abstract class Vehicle
{
    protected string $manufacturer;
    protected string $model;
    protected int $year;
    protected string $color;

    public function __construct(string $manufacturer, string $model, int $year, string $color)
    {
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
    }

    abstract protected function start(): string;
    abstract protected function stop(): string;
    protected function getModel(): string
    {
        return $this->model;
    }
    abstract protected function setModel(string $model): void;
    abstract protected function setManufacturer(string $manufacturer): void;
}
interface Drivable
{
    public function drive(): string;
    public function park(): string;
}
interface GetData
{
    public function getData(): array;
}
class Car extends Vehicle implements Drivable, GetData
{
    public function __construct(string $manufacturer, string $model, int $year, string $color)
    {
        parent::__construct($manufacturer, $model, $year, $color);
    }


    public function start(): string
    {
        return "{$this->model} is starting.";
    }
    public function stop(): string
    {
        return "{$this->model} is stopped driving";
    }
    public function drive(): string
    {
        return "{$this->model} is driving";
    }
    public function park(): string
    {
        return "{$this->model} is parked";
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function setModel(string $model): void
    {
        $this->model = $model;
    }
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }
    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }
    public function getData(): array
    {
        return [$this->getModel(), $this->getManufacturer(), $this->color, $this->year];
    }
}

$car = new Car("BMW", "M3", 2019, "Red");

echo "{$car->start()} \n";
echo "{$car->drive()} \n";
echo "{$car->stop()} \n";
echo "{$car->park()} \n";
echo "Model: {$car->getModel()} \n";
echo "Manufacturer:{$car->setModel("M4")} \n";
echo "{$car->getManufacturer()} \n";
echo "{$car->setManufacturer("Tesla")} \n";
print_r($car->getData());
