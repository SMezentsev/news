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
            <?php if (0) { ?>
              <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated"
                       style="visibility: visible; animation-name: fadeIn;">
                <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                  <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                  <a href="https://newsviral-html.vercel.app/single.html">
                    <img src="./images/news-21.jpg" alt="post-slider">
                  </a>
                </div>
                <div class="pr-10 pl-10">
                  <div class="entry-meta mb-30">
                    <a class="entry-meta meta-0" href="https://newsviral-html.vercel.app/category.html"><span
                        class="post-in background2 text-primary font-x-small">Technology</span></a>
                    <div class="float-right font-small">
                          <span><span class="mr-10 text-muted"><i class="fa fa-eye"
                                                                  aria-hidden="true"></i></span>5.8k</span>
                      <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-comment"
                                                                            aria-hidden="true"></i></span>2.5k</span>
                      <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-share-alt"
                                                                            aria-hidden="true"></i></span>125k</span>
                    </div>
                  </div>
                  <h4 class="post-title mb-20">
                                                    <span class="post-format-icon">
                                                        <ion-icon name="headset-outline" role="img" class="md hydrated"
                                                                  aria-label="headset outline"><template
                                                            shadowrootmode="open"><div class="icon-inner"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="ionicon s-ion-icon" viewBox="0 0 512 512"><path
                                                                  d="M83 384c-13-33-35-93.37-35-128C48 141.12 149.33 48 256 48s208 93.12 208 208c0 34.63-23 97-35 128"
                                                                  stroke-linecap="round" stroke-linejoin="round"
                                                                  class="ionicon-fill-none ionicon-stroke-width"></path><path
                                                                  d="M108.39 270.13l-13.69 8h0c-30.23 17.7-31.7 72.41-3.38 122.2s75.87 75.81 106.1 58.12h0l13.69-8a16.16 16.16 0 005.78-21.87L130 276a15.74 15.74 0 00-21.61-5.87zM403.61 270.13l13.69 8h0c30.23 17.69 31.74 72.4 3.38 122.19s-75.87 75.81-106.1 58.12h0l-13.69-8a16.16 16.16 0 01-5.78-21.87L382 276a15.74 15.74 0 0121.61-5.87z"
                                                                  stroke-miterlimit="10"
                                                                  class="ionicon-fill-none ionicon-stroke-width"></path></svg></div></template></ion-icon>
                                                    </span>
                    <a href="https://newsviral-html.vercel.app/single.html">Team Bitbose geared up to attend
                      Blockchain World Conference ’18 in Atlantic City, New Jersey</a></h4>
                  <div class="mb-20 overflow-hidden">
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                          <span class="post-by">By <a
                              href="https://newsviral-html.vercel.app/author.html">KNICKMEYER</a></span>
                      <span class="post-on">18/09/2020 09:35 EST</span>
                      <span class="time-reading">12 mins read</span>
                      <p class="font-x-small mt-10">Updated 18/09/2020 10:28 EST</p>
                    </div>
                    <div class="float-right">
                      <a href="https://newsviral-html.vercel.app/single.html" class="read-more"><span
                          class="mr-10"><i
                            class="fa fa-thumbtack" aria-hidden="true"></i></span>Picked by Editor</a>
                    </div>
                  </div>
                </div>
              </article>
            <?php } ?>

            <?php $news = \common\models\News::find()->orderBy('date DESC')->limit(15)->all(); ?>

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
                <img class="border-radius-10" src="<?= $item->files->resize_image2 ?>" alt="post-slider">
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
