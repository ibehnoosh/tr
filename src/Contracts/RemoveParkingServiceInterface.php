<?php

namespace App\Contracts;

interface RemoveParkingServiceInterface
{
    public function removeCar($licensePlate): string;
}