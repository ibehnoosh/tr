<?php

namespace App\Services;

use App\Contracts\ParkedCarDisplayInterface;
use App\Contracts\ParkingService;

class ParkedCarDisplayService extends ParkingService implements ParkedCarDisplayInterface
{

    public function getAllParkedCars(): string
    {
        $cars = $this->parkingLot->getAllCars();

        if (empty($cars)) {
            return "No cars are currently parked in the parking lot";
        }

        $output = "Currently parked cars:\n";
        foreach ($cars as $car) {
            $output .= "- License Plate: {$car->getLicensePlate()}\n";
        }

        return $output;
    }

}
