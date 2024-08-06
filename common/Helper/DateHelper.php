<?php

namespace common\Helper;

class DateHelper
{

  public static function months($month = null, $type = true)
  {

    $months = [
      1 => 'Январь',    2 => 'Февраль',   3 => 'Март',     4 => 'Апрель',
      5 => 'Май',       6 => 'Июнь',      7 => 'Июль',     8 => 'Август',
      9 => 'Сентябрь',  10 => 'Октябрь',  11 => 'Ноябрь',  12 => 'Декабрь'
    ];

    $months2 = [
      1 => 'Января',    2 => 'Февраля',   3 => 'Марта',     4 => 'Апреля',
      5 => 'Мая',       6 => 'Июня',      7 => 'Июля',     8 => 'Августа',
      9 => 'Сентября',  10 => 'Октября',  11 => 'Ноября',  12 => 'Декабря'
    ];

    if ($month) {
      return $type ? $months[intval($month)]??'' : $months2[intval($month)]??'';
    }

    return $type ? $months : $months2;
  }

  public static function dayInWeek()
  {

    return [
      1 => 'Понедельник',
      2 => 'Вторник',
      3 => 'Среда',
      4 => 'Четверг',
      5 => 'Пятница',
      6 => 'Суббота',
      7 => 'Воскресенье',
    ];
  }

  public static function dayInWeekShort($day = null)
  {

    $days = [
      1 => 'Пн',
      2 => 'Вт',
      3 => 'Ср',
      4 => 'Чт',
      5 => 'Пт',
      6 => 'Сб',
      7 => 'Вс',
    ];

    if ($day) {
      return $days[intval($day)]??'';
    }
    return $days;
  }
}
