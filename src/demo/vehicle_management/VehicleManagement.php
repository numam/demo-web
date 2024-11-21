<?php

require_once 'Traits/LoggerTrait.php';
require_once 'Classes/AbstractVehicle.php';
require_once 'Classes/Car.php';
require_once 'Classes/Bike.php';

use VehicleManagement\Classes\Car;
use VehicleManagement\Classes\Bike;

function displaySeparator() {
    echo str_repeat("=", 30) . "\n"; //maksimal 30 karakter
}

echo "<pre>";
echo "=== Vehicle Management System ===\n";
displaySeparator();

$car = new Car('Toyota', 4);
$car->displayInfo();

displaySeparator();

$bike = new Bike('Honda', 2);
$bike->displayInfo();

displaySeparator();
echo "</pre>";
?>
