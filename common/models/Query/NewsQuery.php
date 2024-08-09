<?php

namespace common\models\Query;

use Yii;
use \yii\db\ActiveQuery;

class NewsQuery extends ActiveQuery
{

  public function show()
  {

    return $this->andWhere(['show' => 1]);
  }
}
