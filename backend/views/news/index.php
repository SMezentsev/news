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
use Carbon\Carbon;
use common\Helper\DateHelper;

$menu = Menu::findOne(['url' => Yii::$app->controller->id]);
?>

<?= BreadcrumbWidget::widget([
  'title' => 'Новости',
  'createUrl' => '/news/create',
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
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => '',
      'filter' => false,
      'width' => '10%',
      'format' => 'raw',
      'value' => function ($model) {

        $file = $model->getFiles()->one();
        if($file) {

          return '<a href="news/' . $model->id . '" class="symbol symbol-50px">
                    <span class="symbol-label" style="background-image:url(' . Yii::$app->params['imageUrl'].$file->resize_image1 . ');"></span>
                </a>';
        }
        return '';
      }
    ],

    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'title',
      'filter' => false,
      'format' => 'raw',
      'value' => function ($model) {

         return '<strong>'.$model->category->name.'</strong>: '.$model->title;
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => 'Кол-во симовлов',
      'filter' => false,
      'width' => '10%',
      'format' => 'raw',
      'value' => function ($model) {

        return strlen(str_replace(' ', '', $model->text));
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => 'Ключ. слоав',
      'filter' => false,
      'width' => '10%',
      'format' => 'raw',
      'value' => function ($model) {

        if($model->keywords??false) {
          return 'Не указаны';
        }
        return '';
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'label' => '',
      'filter' => false,
      'width' => '30%',
      'format' => 'raw',
      'value' => function ($model) {

        $tags = $model->tags;
        $newsTags = '';
        foreach ($tags as $tag) {

          $newsTags .= '<div class="badge badge-table badge-success">'.$tag->name.'</div>  ';
        }
        return $newsTags;
      }
    ],
    [
      'hAlign' => 'center',
      'vAlign' => 'middle',
      'attribute' => 'date',
      'width' => '10%',
      'filter' => false,
      'value' => function ($model) {

        return Carbon::parse($model->date)->format('H:i, ').'
        '.Carbon::parse($model->date)->format('m-d-y');
      }
    ],
    [
      'class' => 'yii\grid\ActionColumn',
      'headerOptions' => ['width' => '150'],
      'contentOptions' => ['class' => 'actions'],
      'template' => '{edit}  {delete}',
      'buttons' => [
        'edit' => function ($url, $model) {

          return '<a href="/news/' . $model->id . '" class="menu-link px-3">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#009ef7" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                            <rect fill="#009ef7" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                        </g>
                    </svg><!--end::Svg Icon-->
                    </span>
                  </a>';
        },
        'delete' => function ($url, $model) {

          return '<a href="/news/' . $model->id . '/delete" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row">
                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"/>
                              <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#009ef7" fill-rule="nonzero"/>
                              <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#009ef7" opacity="0.3"/>
                          </g>
                      </svg>
                    </span>
                  </a>';
        }
      ],
    ],
  ],
]); ?>

<?= PanelWidget::finish(); ?>

