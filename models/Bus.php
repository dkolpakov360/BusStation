<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus".
 *
 * @property int $id
 * @property string|null $brand
 * @property string|null $model
 * @property int|null $year
 * @property int|null $speed
 *
 * @property RelationBusDriver[] $relationBusDrivers
 */
class Bus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'speed'], 'integer'],
            [['brand'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand' => 'Brand',
            'model' => 'Model',
            'year' => 'Year',
            'speed' => 'Speed',
        ];
    }

    /**
     * Gets query for [[RelationBusDrivers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRelationBusDrivers()
    {
        return $this->hasMany(RelationBusDriver::className(), ['bus_id' => 'id']);
    }
}
