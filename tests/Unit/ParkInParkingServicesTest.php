<?php

namespace Tests\Unit;

use App\Exceptions\NoFreeSpaceException;

use App\Models\ParkingLot;
use App\Services\ParkInParkingService;
use PHPUnit\Framework\TestCase;

class ParkInParkingServicesTest extends TestCase
{
    private ParkInParkingService $parkingService;
    private ParkingLot $parkingLot;

    protected function setUp(): void
    {
        parent::setUp();
        $this->parkingLot = new ParkingLot(2);
        $this->parkingService = new ParkInParkingService($this->parkingLot);
    }

    public function test_Park_car()
    {
        $this->parkingService->parkCar('AB1234');
        $this->assertEquals(1, $this->parkingLot->getOccupiedSpaces());
        $this->parkingService->parkCar('CD5678');
        $this->assertEquals(2, $this->parkingLot->getOccupiedSpaces());

    }

    public function test_Park_car_throw_error_if_full()
    {
        $this->parkingService->parkCar('AB1234');
        $this->parkingService->parkCar('CD5678');
        $result=$this->parkingService->parkCar('EF9101');
        $this->assertEquals((new NoFreeSpaceException())->getMessage(), $result);
    }

}
