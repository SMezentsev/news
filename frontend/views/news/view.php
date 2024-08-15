<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
use common\models\NewsCategory;

$category = NewsCategory::find()->where(['id' => $model->category_id])->one();
$parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
$categories = NewsCategory::find()->where(['parent_id' => $category->parent_id])->all();
?>


<?= $this->render('@frontend/views/news/_nav.php', ['categories' => $categories, 'parent' => $parent, 'category' => $category]) ?>

<div class="entry-header entry-header-1 ml-10 mb-30 mt-50">

  <h1 class="post-title mb-30">
    <?= $model->title ?>
  </h1>
  <div class="entry-meta meta-1 font-x-small color-grey">
    <?php if (0) { ?>
      <span class="post-by">By <a href="author.html">Adam Liptak </a> &amp; <a
          href="author.html">Michael D. Shear</a></span>
    <?php } ?>
    <span class="post-on">
          <?= Carbon::parse($model->date)->format('H:i, '); ?>
          <?= intval(Carbon::parse($model->date)->format('d')); ?>
          <?= DateHelper::months(Carbon::parse($model->date)->format('m'), false) ?>
          <?= Carbon::parse($model->date)->format('y'); ?>
    </span>
    <?php if (0) { ?>
      <span class="time-reading">12 mins read</span>
      <p class="font-x-small mt-10">
        <span class="hit-count"><i class="ti-comment mr-5"></i>82 comments</span>
        <span class="hit-count"><i class="ti-heart mr-5"></i>68 likes</span>
        <span class="hit-count"><i class="ti-star mr-5"></i>8/10</span>
      </p>
    <?php } ?>
  </div>
</div>

<div class="row mb-50" style="transform: none;">

  <!--End col-lg-4-->


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
          <img class="border-radius-5" src="<?= $model->mainFile->original ?? '' ?>" style="max-width:500px">
          <?php if (0) { ?>
            <figcaption> And far contrary smoked some contrary among stealthy</figcaption>
          <?php } ?>
        </figure>
      </div>
      <p><?= $model->text ?></p>
      <?php ?>

    </div>
    <div class="entry-bottom mt-50 mb-30">
      <?php if ($tags = $model->tags) { ?>
        <div class="overflow-hidden mt-30">
          <div class="tags float-left text-muted mb-md-30">
            <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Теги: </span>
            <?php foreach ($tags as $item) { ?>
              <a href="/news/tags/<?= $item->id ?>" rel="tag"><?= $item->name ?></a>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="entry-bottom mt-50 mb-30">
      <?php if (0) { ?>
        <div class="font-weight-500 entry-meta meta-1 font-x-small color-grey">
          <span class="update-on"><i class="ti ti-reload mr-5"></i>Updated 18/09/2020 10:28 EST</span>
          <span class="hit-count"><i class="ti-comment"></i>82 comments</span>
          <span class="hit-count"><i class="ti-heart"></i>68 likes</span>
          <span class="hit-count"><i class="ti-star"></i>8/10</span>
        </div>
      <?php } ?>
      <div class="overflow-hidden mt-30">
        <?php if (0) { ?>
          <div class="tags float-left text-muted mb-md-30">
            <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Tags: </span>
            <a href="category.html" rel="tag">tech</a>
            <a href="category.html" rel="tag">world</a>
            <a href="category.html" rel="tag">global</a>
          </div>
        <?php } ?>
        <?php if (0) { ?>
          <div class="single-social-share float-right">
            <ul class="d-inline-block list-inline">
              <li class="list-inline-item"><span class="font-small text-muted"><i
                    class="ti-sharethis mr-5"></i>Share: </span></li>
              <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i
                    class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank"
                                              href="#"><i
                    class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank"
                                              href="#"><i
                    class="ti-pinterest"></i></a></li>
              <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank"
                                              href="#"><i
                    class="ti-instagram"></i></a></li>
              <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i
                    class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php if ($relatedPosts ?? false) { ?>
      <?= $this->render('@frontend/views/news/_related_posts.php', ['relatedNews' => $relatedNews]) ?>
    <?php } ?>

  </div>

  <div class="col-lg-4 col-md-12 sidebar-right sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; left: 983.778px; top: 0px;"><div class="pl-lg-50">
        <?php
        $populars = \common\models\News::find()->where(['category_id' => $model->category_id])->andWhere(['not in', 'id', [$model->id]])->orderBy('views DESC')->limit(10)->all();

        if(count($populars)) {
        ?>
        <?= $this->render('@frontend/views/articles/_article_without_background', ['news' => array_slice($populars, 0, 5)]) ?>

        <?php foreach (array_slice($populars, 5) as $item) { ?>

          <?= $this->render('@frontend/views/articles/_article_380.php', [
            'news' => $item
          ]) ?>
        <?php } ?>
        <?php } ?>
      </div></div></div>


</div>
