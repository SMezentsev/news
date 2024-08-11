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

    $days = [1=>'Понедельник', 2=>'Вторник', 3=>'Среда', 4=>'Четверг', 5=>'Пятница', 6=>'Суббота', 0=>'Воскресенье'];
    $months = DateHelper::months();

    $n = date("w", mktime(0,0,0,date("m"),date("d"),date("Y")));

    $weatherList = Weather::find()
      ->where(['=', new \yii\db\Expression("date::date"), Carbon::today()->format('Y-m-d')])->all();

    return $this->render('index', [
      'day' => $days[Carbon::now()->dayOfWeek],
      'date' => Carbon::now()->format('d'),
      'month' => DateHelper::months(Carbon::today()->format('m'), false),
      'weatherList' => $weatherList
    ]);
  }
}
