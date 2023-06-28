<?php

namespace App\Models;

use App\Exceptions\CarNotFoundException;
use App\Exceptions\NoFreeSpaceException;

class ParkingLot
{
    private $cars = [];

    public function __construct(
        private readonly int $capacity
    )
    {
    }

    public function parkCar(Car $car)
    {
        if (!$this->getEmptySpaces()) {
            throw new NoFreeSpaceException();
        }

        $this->cars[] = $car;
    }

    public function removeCar(Car $car)
    {
        $key = array_search($car, $this->cars);

        if ($key === false) {
            throw new CarNotFoundException(message: $car->getLicensePlate());
        }

        unset($this->cars[$key]);
    }

    public function getOccupiedSpaces(): int
    {
        return count($this->cars);
    }

    public function getEmptySpaces(): int
    {
        return $this->capacity - $this->getOccupiedSpaces();
    }

    public function getAllCars(): array
    {
        return $this->cars;
    }
}
