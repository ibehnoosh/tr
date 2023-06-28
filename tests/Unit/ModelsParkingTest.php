<?php
namespace Tests\Unit;

use App\Exceptions\CarNotFoundException;
use App\Exceptions\NoFreeSpaceException;
use App\Models\Car;
use App\Models\ParkingLot;
use PHPUnit\Framework\TestCase;

class ModelsParkingTest extends TestCase
{
    public function test_is_object_create()
    {
        $parkingLot= new ParkingLot(10);
        $this->assertInstanceOf(ParkingLot::class,$parkingLot);
    }
    public function test_park_car()
    {
        $parkingLot = new ParkingLot(1);
        $car = Car::create('ABC123');
        $parkingLot->parkCar($car);
        $this->assertEquals(1, $parkingLot->getOccupiedSpaces());
    }

    public function test_ParkCar_throws_exception_when_full()
    {
        $parkingLot = new ParkingLot(1);
        $car1 = Car::create('ABC123');
        $car2 = Car::create('DEF456');
        $parkingLot->parkCar($car1);
        $this->expectException(NoFreeSpaceException::class);
        $parkingLot->parkCar($car2);
    }

    public function test_remove_car()
    {
        $parkingLot = new ParkingLot(1);
        $car = Car::create('ABC123');
        $parkingLot->parkCar($car);
        $parkingLot->removeCar($car);
        $this->assertEquals(0, $parkingLot->getOccupiedSpaces());
    }

    public function test_remove_car_throws_exception_when_car_not_found()
    {
        $parkingLot = new ParkingLot(1);
        $car1 = Car::create('ABC123');
        $car2 = Car::create('DEF456');
        $parkingLot->parkCar($car1);
        $this->expectException(CarNotFoundException::class);
        $parkingLot->removeCar($car2);
    }

    public function test_get_occupied_dpaces()
    {
        $parkingLot = new ParkingLot(2);
        $car1 = Car::create('ABC123');
        $car2 = Car::create('DEF456');
        $parkingLot->parkCar($car1);
        $parkingLot->parkCar($car2);
        $this->assertEquals(2, $parkingLot->getOccupiedSpaces());
    }

    public function test_get_empty_spaces()
    {
        $parkingLot = new ParkingLot(2);
        $car1 = Car::create('ABC123');
        $car2 = Car::create('DEF456');
        $parkingLot->parkCar($car1);
        $this->assertEquals(1, $parkingLot->getEmptySpaces());
        $parkingLot->parkCar($car2);
        $this->assertEquals(0, $parkingLot->getEmptySpaces());
    }

}
