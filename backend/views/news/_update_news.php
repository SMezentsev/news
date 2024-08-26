<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */


use app\components\PanelWidget;
use yii\helpers\Html;
use backend\models\Menu;
use kartik\select2\Select2;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\components\BreadcrumbWidget;
use kartik\checkbox\CheckboxX;
use common\models\NewsCategory;
use mihaildev\ckeditor\CKEditor;
use kartik\datetime\DateTimePicker;
use common\models\NewsSources;
use common\models\NewsTypes;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
//$parent = Menu::findOne(['id' => $menu->parent_id]);
?>


<?= BreadcrumbWidget::widget([
  'title' => 'Товары',
  'createUrl' => '/news/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->title]
  ]
]);
?>

<?= PanelWidget::start(false); ?>

<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10">
  <!--begin::Card body-->
  <?php require_once('_tabs.php'); ?>
  <!--end::Card body-->
</div>
<div class="card card-flush">
  <!--begin::Card header-->
  <div class="card-body pb-0">
    <div class="row">
      <!--begin::Col-->
      <div class="col-md-8">

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

            <?= $form->field($model, 'news_source_id')->widget(Select2::classname(), [
              'data' => ArrayHelper::map(NewsSources::find()->asArray()->all(), 'id', 'name'),
              'options' => ['placeholder' => 'Выбрать источник'],
            ]); ?>

            <?= $form->field($model, 'news_type_id')->widget(Select2::classname(), [
              'data' => ArrayHelper::map(NewsTypes::find()->asArray()->all(), 'id', 'name'),
              'options' => ['placeholder' => 'Выбрать тип новости'],
            ]); ?>

          </div>
          <div class="col-md-6">
            <?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
              'options' => [
                'format' => 'yyyy-mm-dd H:i:s'
              ],
              'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd hh:i:s'
              ]
            ]); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?= $form->field($model, 'news_tags')->widget(Select2::classname(), [
              'data' => ArrayHelper::map(\common\models\Tags::find()->asArray()->all(), 'id', 'name'),
              'options' => ['placeholder' => 'Выбрать тег', 'multiple' => true],
            ]); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
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
            <?= $form->field($model, 'text')->widget(CKEditor::className(),[
              'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
              ],
            ]); ?>
<!--            --><?//= $form->field($model, 'text')->widget(Summernote::class, [
//              'useKrajeePresets' => true,
//              // other widget settings
//            ]); ?>
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

      </div>
    </div>
  </div>

</div>

<?= PanelWidget::finish(false); ?>
