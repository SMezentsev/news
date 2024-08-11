<?php

namespace common\models\Query;

use Carbon\Carbon;
use Yii;
use \yii\db\ActiveQuery;

class NewsQuery extends ActiveQuery
{

  public function show()
  {

    return $this->andWhere(['show' => 1]);
  }

  public function current()
  {

    return $this->andWhere(['<=', new \yii\db\Expression("date::date"), Carbon::today()->format('Y-m-d')]);
  }
}
