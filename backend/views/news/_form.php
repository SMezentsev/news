<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */
use common\models\NewsCategory;
use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => $menu->name,
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->title ?? '']
  ]
]);
?>

<?= PanelWidget::start(); ?>

<? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<!--<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">-->
<!--  --><?//= isset($files[0]) ? Html::img(Yii::$app->params['imageUrl'] . $files[0]['resize_image1'], ['style' => 'width:160px']) : '' ?>
<!--</div>-->


<div class="row">
  <div class="col-md-6">
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
    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
      'data' => $data,
      'options' => ['placeholder' => 'Выбрать категорию'],
    ]); ?>

  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
      'options' => [],
      'pluginOptions' => [
        'autoclose' => true,
        'format' => 'dd-M-yyyy'
      ]
    ]); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <?= $form->field($model, 'tag_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(\common\models\Tags::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать тег', 'multiple' => true],
    ]); ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'new_tag'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <?= $form->field($model, 'title'); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <?= $form->field($model, 'announce'); ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <?= $form->field($model, 'text')->widget(Summernote::class, [
      'useKrajeePresets' => true,
      // other widget settings
    ]); ?>
  </div>

</div>

<?= $form->field($model, 'show')->widget(CheckboxX::classname(), [
  'autoLabel' => true,
  'pluginOptions' => [
    'threeState' => false,
    'size' => 'md',

  ]
])->label(false); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>
