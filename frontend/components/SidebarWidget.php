<?php

namespace frontend\components;

use common\models\NewsCategory;
use yii\base\Widget;
use yii\helpers\Html;

class SidebarWidget extends Widget
{

  public $eng_name;
  public $title;
  public $categories;
  public $categoryIds = [];

  public function init()
  {

    if($this->categoryIds && count($this->categoryIds)) {

      $this->categories = NewsCategory::find()->where(['in', 'eng_name', $this->categoryIds])->all();
    } else {

      $category = NewsCategory::find()->where(['eng_name' => $this->eng_name])->one();
      $this->categories = NewsCategory::find()->where(['parent_id' => $category->id])->all();
    }

    parent::init();
  }

  public function run()
  {

    return $this->render('sidebar', [
      'categories' => $this->categories,
      'title' => $this->title,
    ]);
  }
}
