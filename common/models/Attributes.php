<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "attributes".
 *
 * @property int $id
 * @property string|null $name Наименование
 * @property int|null $show Показать/скрыть
 */
class Attributes extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'attributes';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['show'], 'default', 'value' => null],
      [['show'], 'integer'],
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
      'name' => 'Название',
      'show' => 'Показать/скрыть',
    ];
  }
}
