<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yiister\gentelella\widgets\Panel;
use yii\helpers\Html;
use app\components\PanelWidget;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\NewsCategory;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Категории',
  'createUrl' => '/news-category/create',
]);
?>

<?= PanelWidget::start(); ?>

    <?= \kartik\grid\GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'containerOptions' => [
        'style' => 'min-height:100px; overflow: auto; word-wrap: break-word;'
      ],
      'toolbar' => [
      ],

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
        'id',
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'width' => '5%',
          'attribute' => 'icon',
          'filter' => false,
          'format' => 'raw',
          'value' => function($model) {

            return $model->icon ??'';
          }
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'attribute' => 'name',
          'filter' => false,
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'attribute' => 'sort',
          'filter' => false,
        ],
        [
          'hAlign' => 'center',
          'vAlign' => 'middle',
          'width' => '20%',
          'attribute' => 'parent_id',
          'filter' => false,
          'format' => 'raw',
          'value' => function($model) {

            $parent = NewsCategory::find()->where(['id' => $model->parent_id])->one();
            return  $parent->name??$model->parent_id;
          }
        ],
        [
          'class' => 'yii\grid\ActionColumn',
          'headerOptions' => ['width' => '100'],
          'contentOptions' => ['class' => 'actions'],
          'template' => '{update}   {delete}',
          'buttons' => [
            'delete' => function ($url, $model) {
              return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                ['/news/' . $model->id.'/delete'],
              );

            },
          ],
        ],
      ],
    ]); ?>


<?= PanelWidget::finish(); ?>

