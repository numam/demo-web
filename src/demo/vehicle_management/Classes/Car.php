<?php

namespace VehicleManagement\Classes;

class Car extends AbstractVehicle
{
    private $type = 'Car';

    public function displayInfo()
    {
        $this->log("Displaying Car Information");
        echo "- Type   : $this->type\n";
        echo "- Brand  : $this->brand\n";
        echo "- Wheels : $this->wheels\n";
    }
}
?>
