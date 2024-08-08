<?php

namespace frontend\components\WeatherWidget;

use common\models\Weather;
use yii\base\Widget;
use yii\helpers\Html;
use Carbon\Carbon;
use common\Helper\DateHelper;

class WeatherWidget extends Widget
{

  public function init()
  {


    parent::init();
  }

  public function run()
  {

    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
    $months = DateHelper::months();

    $n = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));

    $weatherList = Weather::find()
      ->where(['=', new \yii\db\Expression("date::date"), Carbon::today()->format('Y-m-d')])->all();

    return $this->render('index', [
      'day' => $days[$n],
      'date' => Carbon::now()->format('d'),
      'month' => DateHelper::months(Carbon::today()->format('m'), false),
      'weatherList' => $weatherList
    ]);
  }
}
