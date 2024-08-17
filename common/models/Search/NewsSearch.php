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

class NewsSearch extends ActiveRecord
{

  const STATUS_ACTIVE = 1;

  public ?string $category = '';

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
    ];
  }

  public function attributeLabels()
  {
    return [
      'category_id' => 'category_id',
      'category' => 'category',
    ];
  }

  public function search(?array $params = []): ActiveDataProvider
  {

    if (!empty($params) && (!$this->load($params) || !$this->validate())) {

      throw ValidationErrorException::create($this->errors);
    }

    $query = News::find()->show()->current()->select(['news.id', 'news.title', 'news.date', 'news.show', 'news.announce', 'news.category_id']);

    if ($tag_id = $params['tag_id'] ?? false) {

      $query->leftJoin(NewsTags::tableName(), 'news_tags.news_id = news.id')
        ->andWhere(['news_tags.tag_id' => $tag_id]);
    }

    //$query->andWhere(['<=', 'date', Carbon::now()->format('Y-m-d H:i:s')]);
    $query->andFilterWhere([
      'id' => $this->id,
      'category_id' => $this->category_id
    ]);

    return new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 15
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
