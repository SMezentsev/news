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

  public function current($flag = true)
  {

    return $flag ? $this->andWhere(['<=', 'date', Carbon::now()->format('Y-m-d H:i:s')]) : $this;
  }
}
