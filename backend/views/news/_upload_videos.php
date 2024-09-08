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
use yii\widgets\ActiveForm;
use app\components\BreadcrumbWidget;
use kartik\file\FileInput;


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
      <div class="col-md-6">

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'file')->widget(FileInput::classname(), [

          'options' => ['accept' => 'video/*', 'multiple' => true],
          'pluginOptions' => [
            'allowedFileExtensions' => ['jpg', 'png','jpeg', 'mp4'],
            'allowedFileTypes' => ["image", "video"],
            'showPreview' => false,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false
          ]
        ])->label(false);

        ?>

      </div>
      <div class="col-md-4">
        <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?= \kartik\grid\GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'containerOptions' => [
        'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
      ],

      'toolbar' => [
//        '{export}',
//        '{toggleData}'
      ],
//        'rowOptions' => function($model) {
//
//          if($model->deleted_at) {
//            return ['class' => 'danger']; // Генерирует опции для tr
//          }
//          return [];
//        },
      'pjax' => true,
      'toggleDataOptions' => ['minCount' => 10],
      'bordered' => true,
      'resizableColumns' => true,
      'striped' => false,
      'condensed' => false,
      'responsive' => true,
      'hover' => true,
      'floatHeader' => true,
      'floatHeaderOptions' => ['top' => true],
      'panel' => [
        'type' => 'primary'
      ],
      'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
          'hAlign' => 'center',
          'vAlign' => 'left',
          'attribute' => 'thumbnail',
          'filter' => false,
          'format' => 'raw',
          'value' => function ($model) {
//
//            \yii\helpers\Html::a(
//              yii\helpers\Html::img( $model->name.'.'.$model->ext, ['width' => '80px']),
//              $model->name.'.'.$model->ext,
//              ['data' => ['pjax' => "0"],'rel' => 'fancybox']
//            );

            $html = \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'] . $model->thumbnail, ['width' => '80px']),
              Yii::$app->params['imageUrl'] . $model->original,
              ['data' => ['pjax' => "0"], 'rel' => 'fancybox']);
            $html .= \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'] . $model->resize_image1, ['width' => '80px']),
              Yii::$app->params['imageUrl'] . $model->thumbnail,
              ['data' => ['pjax' => "0"], 'rel' => 'fancybox']);
            $html .= \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'] . $model->resize_image1, ['width' => '80px']),
              Yii::$app->params['imageUrl'] . $model->resize_image1,
              ['data' => ['pjax' => "0"], 'rel' => 'fancybox']);
            $html .= \yii\helpers\Html::a(\yii\helpers\Html::img(Yii::$app->params['imageUrl'] . $model->resize_image2, ['width' => '80px']),
              Yii::$app->params['imageUrl'] . $model->resize_image2,
              ['data' => ['pjax' => "0"], 'rel' => 'fancybox']);

            return $html;
          },
        ],

        [

          'hAlign' => 'center',
          'vAlign' => 'middle',
          'filter' => false,
          'attribute' => 'file_source_id',
          'format' => 'raw',
          'value' => function ($model) {

            return $this->render('_files_author', ['model' => $model]);

          },
        ],
        [

          'hAlign' => 'center',
          'vAlign' => 'middle',
          'filter' => false,
          'attribute' => 'main',
          'format' => 'raw',
          'value' => function ($model) {

            return $this->render('_main_checkbox', ['model' => $model]);

          },
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'filter' => false,
          'attribute' => 'Галерея',
          'format' => 'raw',
          'value' => function ($file) use ($model) {

            return $this->render('_gallery_checkbox', ['news' => $model, 'model' => $file]);
          },
        ],
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '60'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{delete}',
          'buttons' => [
            'delete' => function ($url, $file) use ($model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['/news/' . $model->id . '/files/' . $file->id . '/delete'],
              );

            },
          ],
        ],
      ],
    ]); ?>

  </div>

</div>

<?= PanelWidget::finish(false); ?>
