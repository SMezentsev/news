<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\checkbox\CheckboxX;

$form = ActiveForm::begin([
  'id' => 'Gallery',
  'action' => '/news/' . $news->id . '/gallery/'.$model->id]);

echo CheckboxX::widget([
  'model' => $news,
  'name' => 'gallery'.$news->id,
  'value' => \common\models\NewsGallery::find()->where(['news_id' =>$news->id, 'file_id' => $model->id])->one() ? true : false,
  'options' => ['id' => 'gallery'.$model->id],
  'pluginOptions' => ['threeState' => false],
  'pluginEvents' => [
    "change"=> 'function() { this.form.submit(); }',
  ]
]);
ActiveForm::end();
