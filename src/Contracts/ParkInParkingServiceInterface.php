<?php

namespace App\Contracts;

interface ParkInParkingServiceInterface
{
    public function parkCar($licensePlate): string;

}