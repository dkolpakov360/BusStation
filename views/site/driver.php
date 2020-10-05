<?php

use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Driver;
use app\components\CalculateDistance;
?>

<?= GridView::widget([
    'dataProvider' => $driverProvider,
]); ?>

<?php 
echo '<pre>';
foreach ($drivers as $driver) {

    //$distance = 1200;
        echo '№: '.$driver->id.'<br>';
        echo 'Name: '.$driver->name.'<br>';
        echo 'Birthday: '.$driver->birthday.'<br>';
        $driver_age = date('Y')-substr($driver->birthday, 0, 4);
        echo 'Age: '.$driver_age.'<br>';
        foreach ($driver->buses as $bus) {
            echo 'TravelTime: '.round(CalculateDistance::run($_GET['x1'], $_GET['y1'], $_GET['x2'], $_GET['y2']) / $bus->speed / 8, 1);
            echo ' ('.$bus->brand.'-'.$bus->model.' '.$bus->speed.'km/h)';
            echo '<br>';
        }
        echo '<hr>';
}
echo '</pre>'; 

?>
