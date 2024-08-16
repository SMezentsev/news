<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.02.23
 * Time: 16:01
 */

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use Carbon\Carbon;
use common\models\Query\NewsQuery;

class News extends ActiveRecord
{

  const STATUS_INACTIVE = 0;
  const STATUS_ACTIVE = 1;

  public $file;
  public $new_tag;
  public $news_tags;
  public $tag_id;

  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%news}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id', 'category_id', 'views', 'tag_id'], 'integer'],
      [['title', 'announce', 'text', 'date',], 'string'],
      [['show'], 'boolean'],
      [['news_tags', 'new_tag'], 'safe'],
      [['file'], 'file', 'extensions' => 'png,jpg, jpeg'],
    ];
  }

  public function attributeLabels()
  {

    return [
      'id' => 'id',
      'name' => 'Название',
      'show' => 'Показать/Скрыть',
      'announce' => 'Анонс',
      'data' => 'Дата',
      'category_id' => 'Категория',
      'text' => 'Содержание',
      'title' => 'Заголовок',
      'file' => 'Изображение',
      'news_tags' => 'Теги',
      'tag_id' => 'Теги ID',
      'new_tag' => 'Новый тег (через запятую)',
      'views' => 'Просмотры',
      'date' => 'Дата'
    ];
  }

  public function getCategory()
  {

    return $this->hasOne(NewsCategory::class, ['id' => 'category_id']);
  }

  public function getFiles()
  {

    return $this->hasMany(Files::className(), ['table_id' => 'id'])->andWhere(['table_name' => 'news']);;
  }

  public function getNewsTags()
  {
    return $this->hasMany(NewsTags::class, ['news_id' => 'id']);
  }

  public function getTags()
  {
    return $this->hasMany(Tags::class, ['id' => 'tag_id'])->via('newsTags');
  }

  public function getMainFile()
  {

    return $this->hasOne(Files::className(), ['table_id' => 'id'])->where(['main' => 1])->andWhere(['table_name' => 'news']);;
  }

  public static function getAll()
  {

    return static::findAll(['show' => self::STATUS_ACTIVE]);
  }

  public static function find()
  {
    return (new NewsQuery(get_called_class()))->show();
  }

  public function beforeSave($insert)
  {

    if (parent::beforeSave($insert)) {


      if($this->date == null) {

        $this->date = Carbon::parse($this->date)->format('Y-m-d H:i:s');
      }

      return true;
    }
    return false;
  }
}







