<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
use common\models\NewsCategory;

$category = NewsCategory::find()->where(['id' => $model->category_id])->one();
$parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
$categories = NewsCategory::find()->where(['parent_id' => $category->parent_id])->all();
?>

<div class="entry-header entry-header-1 mb-30 mt-50">
  <div class="entry-meta category-menu meta-0 font-small mb-30">
    <a href="<?= '/news/'.($parent->id??$category->id) ?>"><span class="post-cat"><?= $parent->name??$category->name ?></span></a>:
    <?php if($parent) { ?>

      <?php foreach ($categories as $category) { ?>
        <a href="<?= '/news/'.$category->id ?>"><span class="post-cat <?= $model->category_id == $category->id ? 'active' : ''?>"><?= $category->name ?></span></a>
      <?php } ?>
    <?php } ?>
  </div>
  <h1 class="post-title mb-30">
    <?= $model->title ?>
  </h1>
  <div class="entry-meta meta-1 font-x-small color-grey">
    <?php if (0) { ?>
      <span class="post-by">By <a href="author.html">Adam Liptak </a> &amp; <a
          href="author.html">Michael D. Shear</a></span>
    <?php } ?>
    <span class="post-on">
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

<div class="col-lg-8 col-md-12">

  <div class="bt-1 border-color-1 mb-30"></div>
  <?php if (0) { ?>
    <figure class="single-thumnail mb-30">
      <img src="<?= $model->files->original ?>" alt="">
      <div class="credit mt-15 font-small color-grey">
        <i class="ti-credit-card mr-5"></i><span>Image credit: pexels.com</span>
      </div>
    </figure>

    <div class="single-excerpt">
      <p class="font-large"><?= $model->title ?></p>
    </div>
  <?php } ?>
  <div class="entry-main-content">

    <div class="wp-block-image">
      <figure class="alignright is-resized">
        <img class="border-radius-5" src="<?= $model->files->original ?>" style="max-width:500px">
        <?php if (0) { ?>
          <figcaption> And far contrary smoked some contrary among stealthy</figcaption>
        <?php } ?>
      </figure>
    </div>
    <p><?= $model->text ?></p>
    <?php ?>

  </div>
  <div class="entry-bottom mt-50 mb-30">
    <?php if(0) { ?>
    <div class="font-weight-500 entry-meta meta-1 font-x-small color-grey">
      <span class="update-on"><i class="ti ti-reload mr-5"></i>Updated 18/09/2020 10:28 EST</span>
      <span class="hit-count"><i class="ti-comment"></i>82 comments</span>
      <span class="hit-count"><i class="ti-heart"></i>68 likes</span>
      <span class="hit-count"><i class="ti-star"></i>8/10</span>
    </div>
    <?php } ?>
    <div class="overflow-hidden mt-30">
      <?php if(0) { ?>
      <div class="tags float-left text-muted mb-md-30">
        <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Tags: </span>
        <a href="category.html" rel="tag">tech</a>
        <a href="category.html" rel="tag">world</a>
        <a href="category.html" rel="tag">global</a>
      </div>
      <?php } ?>
      <?php if(0) { ?>
      <div class="single-social-share float-right">
        <ul class="d-inline-block list-inline">
          <li class="list-inline-item"><span class="font-small text-muted"><i
                class="ti-sharethis mr-5"></i>Share: </span></li>
          <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i
                class="ti-facebook"></i></a></li>
          <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i
                class="ti-twitter-alt"></i></a></li>
          <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i
                class="ti-pinterest"></i></a></li>
          <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i
                class="ti-instagram"></i></a></li>
          <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i
                class="ti-linkedin"></i></a></li>
        </ul>
      </div>
      <?php } ?>
    </div>
  </div>
  <?php if(0) { ?>
  <!--related posts-->
  <div class="related-posts">
    <h3 class="mb-30">Related posts</h3>
    <div class="row">
      <article class="col-lg-4">
        <div class="background-white border-radius-10 p-10 mb-30">
          <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
            <a href="single.html">
              <img class="border-radius-15" src="assets/imgs/news-2.jpg" alt="">
            </a>
          </div>
          <div class="pl-10 pr-10">
            <div class="entry-meta mb-15 mt-10">
              <a class="entry-meta meta-2" href="category.html"><span
                  class="post-in text-primary font-x-small">Politic</span></a>
            </div>
            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated"
                                                              aria-label="image outline"></ion-icon>
                                                </span>
              <a href="single.html">The litigants on the screen are not actors</a></h5>
            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
              <span class="post-by">By <a href="author.html">John Nathan</a></span>
              <span class="post-on">8m ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="col-lg-4">
        <div class="background-white border-radius-10 p-10 mb-30">
          <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
            <a href="single.html">
              <img class="border-radius-15" src="assets/imgs/news-5.jpg" alt="">
            </a>
          </div>
          <div class="pl-10 pr-10">
            <div class="entry-meta mb-15 mt-10">
              <a class="entry-meta meta-2" href="category.html"><span
                  class="post-in text-success font-x-small">Tech</span></a>
            </div>
            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="headset-outline" role="img" class="md hydrated"
                                                              aria-label="headset outline"></ion-icon>
                                                </span>
              <a href="single.html">Essential Qualities of Highly Successful Music</a></h5>
            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
              <span class="post-by">By <a href="author.html">K. Steven</a></span>
              <span class="post-on">24m ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="col-lg-4">
        <div class="background-white border-radius-10 p-10">
          <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
            <a href="single.html">
              <img class="border-radius-15" src="assets/imgs/news-7.jpg" alt="">
            </a>
          </div>
          <div class="pl-10 pr-10">
            <div class="entry-meta mb-15 mt-10">
              <a class="entry-meta meta-2" href="category.html"><span
                  class="post-in text-danger font-x-small">Global</span></a>
            </div>
            <h5 class="post-title mb-15">
              <a href="single.html">Essential Qualities of Highly Successful Music</a></h5>
            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
              <span class="post-by">By <a href="author.html">K. Jonh</a></span>
              <span class="post-on">24m ago</span>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
  <?php } ?>

</div>
