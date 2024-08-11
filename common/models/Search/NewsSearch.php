<?php

namespace common\models\Search;

use Carbon\Carbon;
use common\Exceptions\ValidationErrorException;
use common\models\News;
use common\models\NewsCategory;
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

    $query = self::find()
      ->select(['news.id', 'title', 'date', 'announce', 'category_id', 'name'])
      ->leftJoin(NewsCategory::tableName(), 'news_category.id = category_id');

    $query->andWhere(['<=', 'news.date', Carbon::today()->format('Y-m-d H:i:s')]);
    $query->andFilterWhere([
      'id' => $this->id,
      'category_id' => $this->category_id,
      'news.show' => 1
    ]);

    return new ActiveDataProvider([
      'query' => $query,
      'pagination' => false,
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
