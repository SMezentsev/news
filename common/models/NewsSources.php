<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_sources".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 */
class NewsSources extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_sources';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'string'],
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
            'link' => 'Ссылка',
        ];
    }
}
