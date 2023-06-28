<?php
namespace Tests\Unit;

use App\Exceptions\LicensePlatShouldNotEmpty;
use App\Models\Car;
use PHPUnit\Framework\TestCase;

class ModelsCarTest extends TestCase
{
    public function test_is_object_create()
    {
        $car= Car::create('ABC123');
        $this->assertInstanceOf(Car::class,$car);
    }

    public function test_construct_sets_license_plate()
    {
        $licensePlate = 'ABC123';
        $car = Car::create($licensePlate);
        $this->assertEquals($licensePlate, $car->getLicensePlate());
    }

    public function test_construct_throws_exception_if_license_plate_empty()
    {
        $this->expectException(LicensePlatShouldNotEmpty::class);
        $car = Car::create('');
    }
}
