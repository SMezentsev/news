<?php

namespace common\models;

use common\models\City;
use Yii;
use common\models\WeatherType;

/**
 * This is the model class for table "weather".
 *
 * @property int $id
 * @property int $city_id Город
 * @property int $weather_typ_id Тип погоды
 * @property string|null $text Описание
 * @property string|null $date Дата создания
 * @property int|null $show Показать/скрыть
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weather';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'weather_type_id'], 'required'],
            [['city_id', 'weather_type_id', 'show'], 'default', 'value' => null],
            [['city_id', 'weather_type_id', 'show'], 'integer'],
            [['text'], 'string'],
            [['date', 'value'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'weather_type_id' => 'Тип погоды',
            'text' => 'Text',
            'date' => 'Дата',
            'value' => 'Температура',
            'show' => 'Show',
        ];
    }

  public function getType()
  {

    return $this->hasOne(WeatherType::className(), ['id' => 'weather_type_id']);
  }

  public function getCity()
  {

    return $this->hasOne(City::className(), ['id' => 'city_id']);
  }


}
