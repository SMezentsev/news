<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 22.11.11
 * Time: 15:00
 */

use app\components\BreadcrumbWidget;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\checkbox\CheckboxX;
use backend\models\Menu;
use common\models\AttributesGroups;
use common\models\Attributes;
use kartik\select2\Select2;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);

?>

<?= BreadcrumbWidget::widget([
  'title' => 'Группы атрибутов',
  'createUrl' => '/attributes-groups/create',
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name ?? '']
  ]
]);
?>

<?= PanelWidget::start(); ?>
<div class="row ">
  <div class="col-md-12">
    <?php

    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name'); ?>

    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<?php PanelWidget::finish() ?>

<?php if (!$model->isNewRecord) { ?>

  <?= PanelWidget::start(true, [ 'heading' => 'Добавить атрибуты в группу' ]); ?>
  <div class="row ">
    <div class="col-md-12">
      <?php

      $form = ActiveForm::begin(['action' => $model->id.'/product-attributes']); ?>

      <?= $form->field($productAttributesModel, 'attribute_group_id')->hiddenInput(['value'=> $model->id])->label(false); ?>
      <?= $form->field($productAttributesModel, 'attribute_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Attributes::find()->asArray()->all(), 'id', 'name'),
      ]); ?>

      <?= Html::submitButton('Добавить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

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
            'attribute' => 'attribute_id',
            'filter' => false,
            'format' => 'html',
            'value' => static function($model) {

              $attribute = $model->getAttribute($model->attribute_id);
              return $attribute??'';
            }
          ],
          [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['width' => '60'],
            'contentOptions' => ['class' => 'actions'],
            'template' => '{delete}',
            'buttons' => [
              'delete' => function ($url, $productAttributesModel) use ($model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>',
                  ['/attributes-groups/' . $model->id . '/attributes/' . $productAttributesModel->id . '/delete'],
              );

              },
            ],
          ],

        ],
      ]); ?>

    </div>
  </div>
  <?php PanelWidget::finish() ?>
<?php } ?>


