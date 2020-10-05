<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relation_bus_driver".
 *
 * @property int $bus_id
 * @property int $driver_id
 *
 * @property Bus $bus
 * @property Driver $driver
 */
class RelationBusDriver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'relation_bus_driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_id', 'driver_id'], 'required'],
            [['bus_id', 'driver_id'], 'integer'],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bus::className(), 'targetAttribute' => ['bus_id' => 'id']],
            [['driver_id'], 'exist', 'skipOnError' => true, 'targetClass' => Driver::className(), 'targetAttribute' => ['driver_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_id' => 'Bus ID',
            'driver_id' => 'Driver ID',
        ];
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Bus::className(), ['id' => 'bus_id']);
    }

    /**
     * Gets query for [[Driver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriver()
    {
        return $this->hasOne(Driver::className(), ['id' => 'driver_id']);
    }
}
