<?php

namespace App\Services;

use App\Contracts\ParkingService;
use App\Contracts\RemoveParkingServiceInterface;
use App\Models\Car;

class RemoveParkingService extends ParkingService implements RemoveParkingServiceInterface
{
    public function removeCar($licensePlate): string
    {
        try {
            $car = Car::create($licensePlate);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        try {
            $this->parkingLot->removeCar($car);
            return "Car with license plate {$licensePlate} has left the parking lot";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
