<?php

use App\Models\ParkingLot;
use App\Services\ParkedCarDisplayService;
use App\Services\ParkingLotStatusService;
use App\Services\ParkInParkingService;
use App\Services\RemoveParkingService;

require __DIR__.'/../vendor/autoload.php';

// Create a new parking lot with 10 spots
$parkingLot = new ParkingLot(10);
$parkingService = new ParkInParkingService($parkingLot);
$removeParkingService = new RemoveParkingService($parkingLot);
$parkedCarDisplay = new ParkedCarDisplayService($parkingLot);
$parkingLotStatus = new ParkingLotStatusService($parkingLot);

echo $parkingLotStatus->getOccupiedSpaces().PHP_EOL;
echo $parkingService->parkCar('123').PHP_EOL;
echo $parkingService->parkCar("").PHP_EOL;
echo $parkingService->parkCar('125').PHP_EOL;
echo $parkingService->parkCar('126').PHP_EOL;
echo $removeParkingService->removeCar('125').PHP_EOL;
echo $removeParkingService->removeCar('128').PHP_EOL;
echo $parkingLotStatus->getEmptySpaces().PHP_EOL;
echo $parkedCarDisplay->getAllParkedCars().PHP_EOL;
