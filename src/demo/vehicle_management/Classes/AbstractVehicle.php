<?php

namespace VehicleManagement\Classes;

use VehicleManagement\Traits\LoggerTrait;

abstract class AbstractVehicle
{
    use LoggerTrait;

    protected $brand;
    protected $wheels;

    public function __construct($brand, $wheels)
    {
        $this->brand = $brand;
        $this->wheels = $wheels;
    }

    abstract public function displayInfo();

    public function __toString()
    {
        return "Vehicle brand: $this->brand, Wheels: $this->wheels";
    }
}
?>
