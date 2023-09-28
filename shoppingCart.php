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
}
