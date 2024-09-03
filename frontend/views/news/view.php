<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
use common\models\NewsCategory;

$category = NewsCategory::find()->where(['id' => $model->category_id])->one();
$parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
$categories = NewsCategory::find()->where(['parent_id' => $category->parent_id])->all();

$relatedIds[] = $model->id;
?>


<?= $this->render('@frontend/views/news/_nav.php', ['categories' => $categories, 'parent' => $parent, 'category' => $category]) ?>

<div class="entry-header entry-header-1 ml-10 mb-30 mt-50">

  <h1 class="post-title mb-20">
    <?= $model->title ?>
  </h1>
  <div class="entry-meta meta-1 font-x-small color-grey">

    <span class="post-on">
          <?= Carbon::parse($model->date)->format('H:i, '); ?>
          <?= intval(Carbon::parse($model->date)->format('d')); ?>
          <?= DateHelper::months(Carbon::parse($model->date)->format('m'), false) ?>
          <?= Carbon::parse($model->date)->format('y'); ?>
    </span>

  </div>
</div>

<div class="row mb-50" style="transform: none;">

  <div class="col-lg-8 col-md-12">

    <div class="bt-1 border-color-1 mb-30"></div>
    <?php if (0) { ?>
      <figure class="single-thumnail mb-30">
        <img src="<?= $model->mainFile->original ?? '' ?>" alt="">
        <div class="credit mt-15 font-small color-grey">
          <i class="ti-credit-card mr-5"></i><span>Image credit: pexels.com</span>
        </div>
      </figure>

      <div class="single-excerpt">
        <p class="font-large"><?= $model->title ?></p>
      </div>
    <?php } ?>
    <div class="entry-main-content news-text">

      <div class="wp-block-image">
        <figure class="alignright is-resized">
          <?= \yii\helpers\Html::a(yii\helpers\Html::img($model->mainFile->resize_image2), $model->mainFile->original ?? '', ['rel' => 'fancybox', 'class' => 'news-gallery']); ?>

          <?php if ($model->mainFile->source->name??false) { ?>
            <div class="credit mt-15 font-small color-grey">
              <i class="ti-credit-card mr-5"></i><span><?= $model->mainFile->source->name ?></span>
            </div>
          <?php } ?>
        </figure>
      </div>
      <p><?= $model->text ?></p>

      <?php
      if ($gallery = $model->gallery ?? false) { ?>
        <hr class="wp-block-separator is-style-wide">
        <?php foreach ($gallery as $item) { ?>

          <?= \yii\helpers\Html::a(yii\helpers\Html::img($item->resize_image1, ['width' => '120px']), $item->original, ['rel' => 'fancybox', 'class' => 'news-gallery']); ?>

        <?php } ?>
      <?php } ?>
    </div>


    <?php if ($model->source ?? false) { ?>
      <div class="entry-bottom mt-30 mb-0">
        <div class="font-weight-100 entry-meta meta-1 color-grey">
          <span class="update-on">Источник:  <a href="<?= $model->source->link ?>"><?= $model->source->name ?></a></span>
        </div>
      </div>
    <?php } ?>
    <?php if ($tags = $model->tags) { ?>
    <div class="entry-bottom mb-30">
        <div class="overflow-hidden mt-10">
          <div class="tags float-left text-muted mb-md-30">
            <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Теги: </span>
            <?php foreach ($tags as $item) { ?>
              <a href="/news/tags/<?= $item->id ?>" rel="tag"><?= $item->name ?></a>
            <?php } ?>
          </div>
        </div>
    </div>
    <?php } ?>


    <?php if($newsCycles) { ?>

      <div class="related-posts mt-30">
        <h3 class="mb-30">Новости по теме</h3>
        <div class="row">

          <?php foreach ($newsCycles as $item) { ?>
            <?php $relatedIds[] = $item->id; ?>
            <article class="col-lg-4">
              <div class="background-white border-radius-10 p-10 mb-30">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                  <a href="/news/<?= $item->category_id . '/' . $item->id; ?>">
                    <img class="border-radius-15" src="<?= $item->mainFile->resize_image2 ?? '' ?>" alt="">
                  </a>
                </div>
                <div class="pl-10 pr-10">
                  <div class="entry-meta mb-15 mt-10">
                    <a class="entry-meta meta-2" href="/news/<?= $item->category_id; ?>">
                      <span class="post-in text-primary font-x-small"><?= $item->category->name ?? '' ?></span>
                    </a>
                  </div>
                  <h5 class="post-title mb-15">
                  <span class="post-format-icon">
                      <?= $item->category->icon; ?>
                  </span>
                    <a href="/news/<?= $item->category_id . '/' . $item->id; ?>"><?= $item->title ?? '' ?></a>
                  </h5>
                </div>
              </div>
            </article>
          <?php } ?>

        </div>
      </div>
    <?php } ?>

    <?php if ($relatedPosts ?? false) { ?>
      <?= $this->render('@frontend/views/news/_related_posts.php', ['relatedNews' => $relatedNews]) ?>
    <?php } ?>

    <?php
    $related = \common\models\News::find()->where(['category_id' => $model->category_id])->andWhere(['not in', 'id', [$model->id]])->orderBy('views DESC')->limit(6)->all();

    ?>



    <?php if($related) { ?>

    <div class="related-posts mt-20 ">
      <h3 class="mb-30">Похожие новости</h3>
      <div class="row">

        <?php foreach ($related as $item) { ?>
        <?php $relatedIds[] = $item->id; ?>
          <article class="col-lg-4">
            <div class="background-white border-radius-10 p-10 mb-30">
              <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                <a href="/news/<?= $item->category_id . '/' . $item->id; ?>">
                  <img class="border-radius-15" src="<?= $item->mainFile->resize_image2 ?? '' ?>" alt="">
                </a>
              </div>
              <div class="pl-10 pr-10">
                <div class="entry-meta mb-15 mt-10">
                  <a class="entry-meta meta-2" href="/news/<?= $item->category_id; ?>">
                    <span class="post-in text-primary font-x-small"><?= $item->category->name ?? '' ?></span>
                  </a>
                </div>
                <h5 class="post-title mb-15">
                  <span class="post-format-icon">
                      <?= $item->category->icon; ?>
                  </span>
                  <a href="/news/<?= $item->category_id . '/' . $item->id; ?>"><?= $item->title ?? '' ?></a>
                </h5>
              </div>
            </div>
          </article>
        <?php } ?>

      </div>
    </div>
    <?php } ?>

  </div>

  <div class="col-lg-4 col-md-12 sidebar-right sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; left: 983.778px; top: 0px;">
      <div class="pl-lg-50">
        <?php
        $populars = \common\models\News::find()->where(['category_id' => $model->category_id])->current()->andWhere(['not in', 'id', $relatedIds])->orderBy('views DESC')->limit(10)->all();

        if (count($populars)) {
          ?>
          <?= $this->render('@frontend/views/articles/_article_without_background', ['news' => array_slice($populars, 0, 5)]) ?>

          <?php foreach (array_slice($populars, 5) as $item) { ?>

            <?= $this->render('@frontend/views/articles/_article_380.php', [
              'news' => $item
            ]) ?>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>


</div>
