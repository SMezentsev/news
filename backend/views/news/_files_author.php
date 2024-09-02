<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\FilesSources;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$form = ActiveForm::begin([
  'id' => 'FilesSources'.$model->id,
  'action' => '/files/' . $model->id . '/sources']
);

$data = FilesSources::find()->asArray()->indexBy('id')->all();
$data = ArrayHelper::map($data, 'id', 'name');

echo $form->field($model, 'file_source_id')->widget(Select2::classname(), [
  'data' => $data,
  'id' => 'fileSource'.$model->id,
  'options' => ['id' => 'author'.$model->id, 'placeholder' => 'Выбрать источник'],
  'pluginOptions' => [
    'allowClear' => true
  ],
  'pluginEvents' => [
    "change"=> 'function() { this.form.submit(); }',
  ]
])->label(false);

ActiveForm::end();
