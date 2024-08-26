<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_types".
 *
 * @property int $id
 * @property string $name Наименование
 * @property string|null $description Описание типа
 */
class NewsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
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
            'name' => 'Наименование',
            'description' => 'Description',
        ];
    }
}
