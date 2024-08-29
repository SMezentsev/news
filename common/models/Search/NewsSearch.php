<?php

namespace common\models\Search;

use Carbon\Carbon;
use common\Exceptions\ValidationErrorException;
use common\models\News;
use common\models\NewsCategory;
use common\models\NewsTags;
use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use yii\db\Expression;

class NewsSearch extends ActiveRecord
{

  const STATUS_ACTIVE = 1;

  public ?string $category = '';
  public $tag_id ;

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
      [['category_id', 'id'], 'integer'],
      [['category'], 'integer'],
      [['title'], 'string'],
     [['tag_id'], 'safe']
    ];
  }

  public function attributeLabels()
  {
    return [
      'category_id' => 'Категория',
      'tag_id' => 'Теги',
      'category' => 'category',
      'news_cycle_id' => 'Цикл новостей',
      'name' => 'Название новости',
    ];
  }

  public function search(?array $params = [], $limit = 15): ActiveDataProvider
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $query = News::find()->show()->current()->select(['news.id', 'news.title', 'news.date', 'news.show', 'news.announce', 'news.category_id']);

    if ($tag_id = $params['tag_id'] ?? false) {

      $query->leftJoin(NewsTags::tableName(), 'news_tags.news_id = news.id')
        ->andWhere(['news_tags.tag_id' => $tag_id]);
    }

    if ($news_cycle_id = $params['news_cycle_id'] ?? false) {

      $query->andWhere(['news.news_cycle_id' => $news_cycle_id]);
    }

    if ($title = $params['title'] ?? false) {

      $query->andWhere(new Expression('title LIKE \'%' . mb_convert_case(mb_lcfirst($title), MB_CASE_TITLE, "UTF-8") . '%\''));
      $query->orWhere(new Expression('title LIKE \'%' . mb_convert_case($title, MB_CASE_LOWER, "UTF-8"). '%\''));
    }

    //$query->andWhere(['<=', 'date', Carbon::now()->format('Y-m-d H:i:s')]);

    $query->andFilterWhere([
      'id' => $this->id,
      'news_cycle_id' => $this->news_cycle_id,
    ]);


    if($notIn = $params['notIn']??false) {

      $query->andWhere(['not in', 'news.id', $notIn]);
    }

    return new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => $limit
      ],
      'sort' => [
        'defaultOrder' => [
          'date' => SORT_DESC,
        ],
      ],
    ]);
  }

  public function formName()
  {
    return '';
  }
}
