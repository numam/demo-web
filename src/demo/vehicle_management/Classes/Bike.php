<?php

namespace VehicleManagement\Classes;

class Bike extends AbstractVehicle
{
    private $type = 'Bike';

    public function displayInfo()
    {
        $this->log("Displaying Bike Information");
        echo "- Type   : $this->type\n";
        echo "- Brand  : $this->brand\n";
        echo "- Wheels : $this->wheels\n";
    }
}
?>
