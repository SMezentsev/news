<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use common\models\NewsCategory;
use common\models\Tags;
use yii\helpers\ArrayHelper;
use common\models\NewsSources;

?>


<?php
$form = ActiveForm::begin(['method' => 'get', 'action' => '/news/']); ?>

<div class="row">
  <div class="col-md-2">
    <?= $form->field($searchModel, 'title')->label(false); ?>
  </div>
  <div class="col-md-3">

    <?php
    $categories = NewsCategory::find()->where(['in', 'eng_name', ['moscow', 'world']])->all();
    $data = [];
    foreach ($categories as $category) {

    $subCat = NewsCategory::find()->where(['parent_id' => $category->id])->asArray()->all();
    $data[$category->name] = ArrayHelper::map($subCat, 'id', 'name');
    }

    $subCat = NewsCategory::find()->where(['not in', 'eng_name', ['moscow', 'world']])->andWhere(['parent_id' => 0])->asArray()->all();
    $subCat = ArrayHelper::map($subCat, 'id', 'name');
    $data = array_merge($data, [
    'общие' => $subCat
    ]);

    ?>


    <?= $form->field($searchModel, 'category_id')->widget(Select2::classname(), [
      'data' => $data,
      'options' => ['placeholder' => 'Выбрать категорию'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label(false); ?>

  </div>

  <div class="col-md-3">

    <?= $form->field($searchModel, 'tag_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Tags::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать тэг'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label(false); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-3">

    <?= $form->field($searchModel, 'news_source_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(NewsSources::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать источник'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label(false); ?>
  </div>
  <div class="col-md-4">
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-sm btn-primary']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
