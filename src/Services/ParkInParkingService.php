<?php

namespace App\Services;

use App\Contracts\ParkingService;
use App\Contracts\ParkInParkingServiceInterface;
use App\Models\Car;

class ParkInParkingService extends ParkingService implements ParkInParkingServiceInterface
{
    public function parkCar($licensePlate): string
    {
        try {
            $car = Car::create($licensePlate);
        } catch (\Exception $e) {
            return $e->getMessage();
        }


        try {
            $this->parkingLot->parkCar($car);
            return "Welcome, please go in";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
