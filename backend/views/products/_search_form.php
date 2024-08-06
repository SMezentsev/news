<?php

/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.06.19
 * Time: 15:00
 */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\components\PanelWidget;
use kartik\form\ActiveForm;
use common\models\Category;
use kartik\select2\Select2;
use common\models\Tree;
use kartik\tree\TreeViewInput;

?>


<?php
$form = ActiveForm::begin(['method' => 'get']); ?>

<div class="raw">
  <div class="col-md-6">
    <?= $form->field($searchModel, 'name')->label(false); ?>
  </div>
  <div class="col-md-6">

    <?= $form->field($searchModel, 'category_id')->widget(
      TreeViewInput::className(),
      [
        // single query fetch to render the tree
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Categories'],
        'name' => 'Products[category_id]',    // input name
        'asDropdown' => true,            // will render the tree input widget as a dropdown.
        'multiple' => false,            // set to false if you do not need multiple selection
        'fontAwesome' => false,            // render font awesome icons
        'rootOptions' => [
          'label' => '<i class="fa fa-tree"></i>',
          'class' => 'text-success'
        ],                                      // custom root label
      ]
    )->label(false); ?>
  </div>
</div>
<div class="raw">
  <div class="col-md-6">
    <?= $form->field($searchModel, 'property_id')->widget(Select2::classname(), [
      'data' => ArrayHelper::map(\common\models\Property::find()->asArray()->all(), 'id', 'name'),
      'options' => ['placeholder' => 'Выбрать свойство'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ])->label(false); ?>
  </div>
</div>
<div class="raw">
  <div class="col-md-6">
    <?= Html::submitButton('Поиск', ['class' => 'btn btn-sm btn-primary']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
