<?php

use frontend\components\WeatherWidget\WeatherWidget;
use frontend\components\SidebarWidget;

?>

  <!-- main content -->
  <div class="col-lg-10 col-md-9 order-1 order-md-2">

    <div class="row">
      <div class="col-lg-8 col-md-12">

        <div class="latest-post mb-50">
          <?php if (0) { ?>
          <div class="widget-header position-relative mb-30">

            <div class="row">
              <div class="col-7">
                <h4 class="widget-title mb-0">Последние <span>новости</span></h4>
              </div>
              <?php if (0) { ?>
                <div class="col-5 text-right">
                  <h6 class="font-medium pr-15">
                    <a class="text-muted font-small" href="https://newsviral-html.vercel.app/index.html#">View
                      all</a>
                  </h6>
                </div>
              <?php } ?>
            </div>
          </div>
          <?php } ?>
          <div class="loop-list-style-1">



            <?= $this->render('@frontend/views/articles/_article_700_first_post.php', ['news' => $news[0]]) ?>

            <?php foreach (array_slice($news, 1) as $item) { ?>
              <?= $this->render('@frontend/views/articles/_article_square_image.php', ['news' => $item]) ?>
            <?php } ?>
          </div>
        </div>
        <?php if (0) { ?>
          <div class="pagination-area mb-30">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="https://newsviral-html.vercel.app/index.html#"><i
                      class="ti-angle-left"></i></a></li>
                <li class="page-item active"><a class="page-link"
                                                href="https://newsviral-html.vercel.app/index.html#">01</a></li>
                <li class="page-item"><a class="page-link"
                                         href="https://newsviral-html.vercel.app/index.html#">02</a></li>
                <li class="page-item"><a class="page-link"
                                         href="https://newsviral-html.vercel.app/index.html#">03</a></li>
                <li class="page-item"><a class="page-link"
                                         href="https://newsviral-html.vercel.app/index.html#">04</a></li>
                <li class="page-item"><a class="page-link" href="https://newsviral-html.vercel.app/index.html#"><i
                      class="ti-angle-right"></i></a></li>
              </ul>
            </nav>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-12 sidebar-right">
        <?= $this->render('@frontend/views/site/_right_block.php') ?>
      </div>
    </div>
    <!--    --><? //= $this->render('@frontend/views/posts/_post_full_image.php') ?>


  </div>
<?php if(0) { ?>
<div class="post-carausel-1-items mt-30 mb-30 slick-initialized slick-slider">
  <div class="slick-list draggable">
    <div class="slick-track">
      <?php $randomNews = \common\models\News::find()->limit(5)->all(); ?>
      <?php foreach ($randomNews as $item) { ?>
        <div class="col slick-slide slick-cloned" data-slick-index="-6" id="" aria-hidden="true" tabindex="-1"
             style="width: 252px;">
          <div class="slider-single bg-white p-10 border-radius-15">
            <div class="img-hover-scale border-radius-10">
              <a href="/news/<?= $item->category_id ?>/<?= $item->id ?>" tabindex="-1">
                <img class="border-radius-10" src="<?= $item->mainFile->resize_image2 ?>" alt="post-slider">
              </a>
            </div>
            <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
              <a href="/news/<?= $item->category_id ?>/<?= $item->id ?>" tabindex="-1"><?= $item->title ?></a>
            </h6>
            <?php if(0) { ?>
              <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase pl-5 pb-15">
                <span class="post-by">By <a href="author.html" tabindex="-1">K. Marry</a></span>
                <span class="post-on">3m ago</span>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>
</div>
<?php } ?>
