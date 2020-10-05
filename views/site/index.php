<?php
use app\models\Driver;

$DriverTravelTimeResult = json_encode(Driver::getWithTravelTime($_GET['x1'], $_GET['y1'], $_GET['x2'], $_GET['y2']));

print_r($DriverTravelTimeResult);
?>