<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yiister\gentelella\widgets\Panel;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use kartik\color\ColorInput;
use kartik\checkbox\CheckboxX;
use app\components\BreadcrumbWidget;
use backend\models\Menu;
use common\models\WeatherType;
use kartik\select2\Select2;
use common\models\City;
use kartik\date\DatePicker;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => $menu->name,
  'breadcrumbs' => [
    ['label' => $menu->name, 'url' => Yii::$app->getUrlManager()->createUrl([$menu->url])],
    ['label' => $model->name ?? '']
  ]
]);
?>

<?= PanelWidget::start(); ?>

<?php

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'value'); ?>

<?= $form->field($model, 'city_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(City::getAll(), 'id', 'name'),
  'options' => ['placeholder' => 'Выбрать город'],
  'pluginOptions' => [
    'allowClear' => true
  ],
]); ?>
<?= $form->field($model, 'weather_type_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(WeatherType::find()->all(), 'id', 'name'),
  'options' => ['placeholder' => 'Выбрать тип температуры'],
  'pluginOptions' => [
    'allowClear' => true
  ],
]); ?>

<?= $form->field($model, 'date')->widget(DatePicker::classname(), [
  'options' => [],
  'pluginOptions' => [
    'autoclose' => true,
    'format' => 'dd-M-yyyy'
  ]
]); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>


