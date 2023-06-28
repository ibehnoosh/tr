<?php
namespace App\Models;
use App\Contracts\Vehicle;
use App\Exceptions\LicensePlatShouldNotEmpty;

class Car extends Vehicle
{

    public static function create(string $licensePlate): self
    {
        if (empty($licensePlate)) {
            throw new LicensePlatShouldNotEmpty();
        }

        return new self('Car',$licensePlate);
    }



    public function parkingSize(): int
    {
        // TODO: Implement parkingSize() method.
        return 1;
    }
}
