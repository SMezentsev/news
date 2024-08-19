<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news_gallery".
 *
 * @property int $id
 * @property int|null $news_id ID новости
 * @property int|null $file_id ID файла
 */
class NewsGallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_id', 'file_id'], 'default', 'value' => null],
            [['news_id', 'file_id'], 'integer'],
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
            'file_id' => 'File ID',
        ];
    }
}
