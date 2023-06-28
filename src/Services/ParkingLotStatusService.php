<?php

namespace App\Services;

use App\Contracts\ParkingLotStatusInterface;
use App\Contracts\ParkingService;

class ParkingLotStatusService extends ParkingService implements ParkingLotStatusInterface
{

    public function getOccupiedSpaces(): string
    {
        return "There are currently " . $this->parkingLot->getOccupiedSpaces() . " cars parked in the parking lot";
    }

    public function getEmptySpaces(): string
    {
        return "There are currently " . $this->parkingLot->getEmptySpaces() . " Empty space in the parking lot";
    }



}
