<?php

namespace VehicleManagement\Traits;

trait LoggerTrait
{
    public function log($message)
    {
        echo "[LOG] $message\n";
    }
}
?>
