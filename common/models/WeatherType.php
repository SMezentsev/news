<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "weather_type".
 *
 * @property int $id
 * @property string $name Наименование
 * @property int|null $show Показать/скрыть
 */
class WeatherType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['show'], 'default', 'value' => null],
            [['show'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['icon'], 'safe'],
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
            'show' => 'Show',
            'icon' => 'Иконка',
        ];
    }
}
