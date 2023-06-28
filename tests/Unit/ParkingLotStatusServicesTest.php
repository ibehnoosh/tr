<?php

namespace Tests\Unit;

use App\Models\ParkingLot;
use App\Services\ParkingLotStatusService;
use App\Services\ParkInParkingService;
use PHPUnit\Framework\TestCase;

class ParkingLotStatusServicesTest extends TestCase
{
    private ParkingLotStatusService $parkingLotStatusService;
    private ParkInParkingService $parkInParkingService;
    private ParkingLot $parkingLot;

    protected function setUp(): void
    {
        parent::setUp();
        $this->parkingLot = new ParkingLot(2);
        $this->parkingLotStatusService = new ParkingLotStatusService($this->parkingLot);
        $this->parkInParkingService = new ParkInParkingService($this->parkingLot);
    }


    public function testGetOccupiedSpaces()
    {
        $this->assertEquals('There are currently 0 cars parked in the parking lot', $this->parkingLotStatusService->getOccupiedSpaces());

        $this->parkInParkingService->parkCar('AB-1234');
        $this->assertEquals('There are currently 1 cars parked in the parking lot', $this->parkingLotStatusService->getOccupiedSpaces());

        $this->parkInParkingService->parkCar('CD-5678');
        $this->assertEquals('There are currently 2 cars parked in the parking lot', $this->parkingLotStatusService->getOccupiedSpaces());
    }

    public function testGetEmptySpaces()
    {
        $this->assertEquals('There are currently 2 Empty space in the parking lot', $this->parkingLotStatusService->getEmptySpaces());

        $this->parkInParkingService->parkCar('AB-1234');
        $this->assertEquals('There are currently 1 Empty space in the parking lot', $this->parkingLotStatusService->getEmptySpaces());

        $this->parkInParkingService->parkCar('CD-5678');
        $this->assertEquals('There are currently 0 Empty space in the parking lot', $this->parkingLotStatusService->getEmptySpaces());
    }

}
