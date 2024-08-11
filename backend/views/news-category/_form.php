<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use kartik\editors\Summernote;
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
use kartik\date\DatePicker;
use kartik\select2\Select2;
use common\models\NewsCategory;

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

<?= $form->field($model, 'name'); ?>
<?= $form->field($model, 'eng_name'); ?>
<?= $form->field($model, 'icon'); ?>
<?= $form->field($model, 'parent_id')->widget(Select2::classname(), [
  'data' => ArrayHelper::map(NewsCategory::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
  'options' => ['placeholder' => 'Выбрать родительский каталог'],
]); ?>

<?= $form->field($model, 'show')->widget(CheckboxX::classname(), [
  'autoLabel' => true,
  'pluginOptions' => [
    'threeState' => false,
    'size' => 'md'
  ]
])->label(false); ?>

<?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
<?php PanelWidget::finish() ?>
