<?php

namespace app\controllers;

use Yii;
use yii\helpers\Json;
use yii\web\Response;
use app\models\Driver;

class RestController extends \yii\rest\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    public function actionDriverTravelTime($x1, $y1, $x2, $y2)
    {
       return Driver::getWithTravelTime($x1, $y1, $x2, $y2);
    }

    public function actionIndex()
    {
        $raw_body = Yii::$app->request->getRawBody();
        $obj = json_decode($raw_body);

        $driver = new Driver;
        $driver->age = $obj->age;
        $driver->name = $obj->name;

        if (!$driver->validate()) {
            return [
                'status' => false,
                'data' => $driver->errors,
            ];
        }

        $driver->save(false);

        return [
            'status' => true,
        ];
    }

}
