
<?php

use yii\helpers\Html;
use Carbon\Carbon;
use common\Helper\DateHelper;

?>
<div class="card-header pt-10">
  <div class="d-flex align-items-center">
    <!--begin::Icon-->
    <div class="card-image">
      <?php
      if(isset($model->files->thumbnail)) { ?>

      <?= isset($model->files) ? Html::img(Yii::$app->params['imageUrl'] . $model->files['resize_image1'], ['style' => 'width:60px']) : '' ?>
      <?php } ?>
    </div>
    <!--end::Icon-->
    <!--begin::Title-->
    <div class="d-flex flex-column" style="padding-left: 10px; vertical-align: top">
      <h2 class="mb-1"><?= $model->title??'' ?></h2>

        <div class="text-muted fw-bold">
          <?php if(0) { ?>
          <a href="#">Keenthemes</a>
          <span class="mx-3">|</span>
          <a href="#">File Manager</a>
          <span class="mx-3">|</span>2.6 GB
          <?php } ?>

          <?= Carbon::parse($model->date)->format('H:i, '); ?>
          <?= intval(Carbon::parse($model->date)->format('d')); ?>
          <?= DateHelper::months(Carbon::parse($model->date)->format('m'), false) ?>
          <?= Carbon::parse($model->date)->format('y'); ?>
        </div>

    </div>
    <!--end::Title-->
  </div>
</div>
<!--end::Card header-->
<!--begin::Card body-->
<div class="card-body pb-0">
  <!--begin::Navs-->
  <div class="d-flex overflow-auto h-55px">
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update' ? 'active' : '' ?>"
           href="/news/<?= $model->id ?>">Новость</a>
      </li>
      <!--end::Nav item-->
      <!--begin::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'update-files' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/news/<?= $model->id ?>/update-files">Изображения</a>
      </li>
      <!--end::Nav item-->
      <li class="nav-item">
        <a class="nav-link text-active-primary me-6 <?= Yii::$app->controller->action->id === 'materials' ? 'active' : '' ?> <?= $model->isNewRecord ? 'disabled' : '' ?>"
           href="/news/<?= $model->id ?>/materials">Материалы</a>
      </li>

    </ul>
  </div>
  <!--begin::Navs-->
</div>
<!--end::Card body-->
