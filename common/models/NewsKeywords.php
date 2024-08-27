<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_keywords".
 *
 * @property int $id
 * @property int|null $news_id ID новости
 * @property int|null $keyword_id ID ключевых слов
 */
class NewsKeywords extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_keywords';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'keyword_id'], 'default', 'value' => null],
            [['news_id', 'keyword_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'News ID',
            'keyword_id' => 'Keyword ID',
        ];
    }
}
