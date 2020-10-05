<?php

namespace app\models;

use Yii;
use app\components\CalculateDistance;

/**
 * This is the model class for table "driver".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $birthday
 *
 * @property RelationBusDriver[] $relationBusDrivers
 */
class Driver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthday'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'birthday' => 'Birthday',
        ];
    }

    public static function getWithTravelTime($x1, $y1, $x2, $y2)
    {
        $dist_km = CalculateDistance::run($x1, $y1, $x2, $y2);
        $drivers = self::find()->joinWith('buses')->all();
        $driver_result = [];

        foreach ($drivers as $driver) {
            $busesTravelTime = [];
            foreach ($driver->buses as $bus) {
                $busesTravelTime[] = [
                    'car' => $bus->brand.'-'.$bus->model,
                    'travel_time_days' => round($dist_km / $bus->speed / 8, 1),
                ];   
            }
            
            $driver_result[] = [
                'id' => $driver->id,
                'name' => $driver->name,
                'birthday' => $driver->birthday,
                'age' => date('Y') - substr($driver->birthday,0,4),
                'travel_time' => $busesTravelTime,
            ];
            
        }

        return $driver_result;
    }

    /**
     * Gets query for [[RelationBusDrivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelationBusDrivers()
    {
        return $this->hasMany(RelationBusDriver::className(), ['driver_id' => 'id']);
    }

    public function getBuses()
    {
        return $this->hasMany(Bus::className(), ['id' => 'bus_id'])->via('relationBusDrivers');
    }
}
