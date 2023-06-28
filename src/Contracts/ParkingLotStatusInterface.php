<?php

namespace App\Contracts;

interface ParkingLotStatusInterface
{
    public function getOccupiedSpaces(): string;

    public function getEmptySpaces(): string;
}