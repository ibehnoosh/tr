<?php
namespace App\Contracts;

abstract class Vehicle
{
    public function __construct(
        public string $type,
        public string $licensePlate)
    {
    }

    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }
    abstract public function parkingSize(): int;

    //TODO Define method to handle parking Rules for specific Vehicles
}