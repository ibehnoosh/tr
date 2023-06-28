<?php

namespace Tests\Unit;

use App\Exceptions\CarNotFoundException;
use App\Exceptions\NoFreeSpaceException;

use App\Models\ParkingLot;
use App\Services\ParkInParkingService;
use App\Services\RemoveParkingService;
use PHPUnit\Framework\TestCase;

class RemoveParkingServiceTest extends TestCase
{
    private ParkInParkingService $parkInParkingService;
    private RemoveParkingService $removeParkingService;
    private ParkingLot $parkingLot;

    protected function setUp(): void
    {
        parent::setUp();
        $this->parkingLot = new ParkingLot(2);
        $this->parkInParkingService = new ParkInParkingService($this->parkingLot);
        $this->removeParkingService = new RemoveParkingService($this->parkingLot);
    }

    public function test_remove_car()
    {
        $this->parkInParkingService->parkCar('AB-1234');
        $this->parkInParkingService->parkCar('CD-5678');
        $this->removeParkingService->removeCar('AB-1234');
        $this->assertEquals(1, $this->parkingLot->getOccupiedSpaces());
        $this->assertEquals(1, $this->parkingLot->getEmptySpaces());
    }

    public function test_remove_car_throw_error_if_car_not_found()
    {
        $this->parkInParkingService->parkCar('AB1234');
        $this->parkInParkingService->parkCar('CD5678');
        $result=$this->removeParkingService->removeCar('EF9101');
        $this->assertEquals((new CarNotFoundException('EF9101'))->getMessage(), $result);
    }


}
