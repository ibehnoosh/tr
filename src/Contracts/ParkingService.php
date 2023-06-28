<?php

namespace App\Contracts;

use App\Models\ParkingLot;

abstract class ParkingService
{
    public function __construct(
        protected readonly ParkingLot $parkingLot
    )
    {
    }
}