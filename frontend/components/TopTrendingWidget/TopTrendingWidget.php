<?php

namespace frontend\components\TopTrendingWidget;

use yii\base\Widget;
use yii\helpers\Html;
use Carbon\Carbon;

class TopTrendingWidget extends Widget
{

  private $data = [];

  public function init()
  {

    parent::init();
  }

  public function run()
  {

    return $this->render('index', [
      'data' => $this->data??[]
    ]);
  }
}
