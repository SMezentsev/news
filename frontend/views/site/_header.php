<?php

use common\models\NewsCategory;

$categoryWithoutCity = NewsCategory::find()
  ->where(['in', 'eng_name', ['science', 'culture', 'travel', 'economics', 'sport', 'health']])
  ->andWhere(['parent_id' => 0])->all();

$moscow = NewsCategory::find()->andWhere(['eng_name' => 'moscow'])->one();
$moscowCategories = NewsCategory::find()->where(['parent_id' => $moscow->id])->all();

$world = NewsCategory::find()->andWhere(['eng_name' => 'world'])->one();
$worldCategories = NewsCategory::find()->where(['parent_id' => $world->id])->all();

?>
<header class="main-header header-style-2 mb-40">
  <div class="header-bottom header-sticky background-white text-center">
    <div class="scroll-progress gradient-bg-1" style="width: 0%;"></div>
    <?php if(0) { ?>
    <div class="mobile_menu d-lg-none d-block">
      <div class="slicknav_menu">
        <div class="container"><a href="https://newsviral-html.vercel.app/index.html#" aria-haspopup="true"
                                  role="button" tabindex="0" class="slicknav_btn slicknav_collapsed"
                                  style="outline: none;"><span class="slicknav_menutxt">MENU</span><span
              class="slicknav_icon"><span class=""><i class="ti-menu-alt"></i></span><span
                class="ti-close"></span></span></a></div>
        <ul class="slicknav_nav slicknav_hidden" aria-hidden="true" role="menu" style="display: none;">
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Global Economy</a></li>
          <li class="cat-item cat-item-3"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Environment</a></li>
          <li class="cat-item cat-item-4"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Religion</a></li>
          <li class="cat-item cat-item-5"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Fashion</a></li>
          <li class="cat-item cat-item-6"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Terrorism</a></li>
          <li class="cat-item cat-item-7"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Conflicts</a></li>
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Scandals</a></li>
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Executive</a></li>
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Foreign policy</a></li>
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Healthy Living</a></li>
          <li class="cat-item cat-item-3"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Medical Research</a></li>
          <li class="cat-item cat-item-4"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Children’s Health</a></li>
          <li class="cat-item cat-item-5"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Around the World</a></li>
          <li class="cat-item cat-item-6"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Ad Choices</a></li>
          <li class="cat-item cat-item-7"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Mental Health</a></li>
          <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#" role="menuitem"
                                             tabindex="-1">Media Relations</a></li>
        </ul>
      </div>
    </div>
    <?php } ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-3">
          <div class="header-logo d-none d-lg-block">
            <a href="/">
              <span style="color:#ee4a5f">MOS</span><span style="color:#29abe2">OVKA</span>.RU
            </a>
          </div>
          <div class="logo-tablet d-md-inline d-lg-none d-none">
            <a href="https://newsviral-html.vercel.app/index.html">
              MOSOVKA.RU
            </a>
          </div>
          <div class="logo-mobile d-block d-md-none">
            <a href="https://newsviral-html.vercel.app/index.html">
              MOSOVKA.RU
            </a>
          </div>
        </div>
        <div class="col-lg-10 col-md-9 main-header-navigation">
          <!-- Main-menu -->
          <div class="main-nav text-left float-lg-left float-md-right">
            <?php if(0) { ?>
            <ul class="mobi-menu d-none menu-3-columns" id="navigation">
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Global Economy</a>
              </li>
              <li class="cat-item cat-item-3"><a href="https://newsviral-html.vercel.app/index.html#">Environment</a>
              </li>
              <li class="cat-item cat-item-4"><a href="https://newsviral-html.vercel.app/index.html#">Religion</a></li>
              <li class="cat-item cat-item-5"><a href="https://newsviral-html.vercel.app/index.html#">Fashion</a></li>
              <li class="cat-item cat-item-6"><a href="https://newsviral-html.vercel.app/index.html#">Terrorism</a></li>
              <li class="cat-item cat-item-7"><a href="https://newsviral-html.vercel.app/index.html#">Conflicts</a></li>
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Scandals</a></li>
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Executive</a></li>
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Foreign policy</a>
              </li>
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Healthy Living</a>
              </li>
              <li class="cat-item cat-item-3"><a href="https://newsviral-html.vercel.app/index.html#">Medical
                  Research</a></li>
              <li class="cat-item cat-item-4"><a href="https://newsviral-html.vercel.app/index.html#">Children’s
                  Health</a></li>
              <li class="cat-item cat-item-5"><a href="https://newsviral-html.vercel.app/index.html#">Around the
                  World</a></li>
              <li class="cat-item cat-item-6"><a href="https://newsviral-html.vercel.app/index.html#">Ad Choices</a>
              </li>
              <li class="cat-item cat-item-7"><a href="https://newsviral-html.vercel.app/index.html#">Mental Health</a>
              </li>
              <li class="cat-item cat-item-2"><a href="https://newsviral-html.vercel.app/index.html#">Media
                  Relations</a></li>
            </ul>
            <?php } ?>
            <nav>
              <ul class="main-menu d-none d-lg-inline">
                <li >
                  <a href="/">
                      <span >
                        <ion-icon name="home-outline" role="img" class="md hydrated"
                                  aria-label="home outline"><template shadowrootmode="open"><div
                              class="icon-inner"><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="ionicon s-ion-icon"
                                                      viewBox="0 0 512 512"><path
                                  d="M80 212v236a16 16 0 0016 16h96V328a24 24 0 0124-24h80a24 24 0 0124 24v136h96a16 16 0 0016-16V212"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="ionicon-fill-none ionicon-stroke-width"></path><path
                                  d="M480 256L266.89 52c-5-5.28-16.69-5.34-21.78 0L32 256M400 179V64h-48v69"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="ionicon-fill-none ionicon-stroke-width"></path></svg></div></template>
                        </ion-icon>
                      </span>
                  </a>
                </li>
                <li class="menu-item-has-children">
                  <a href="https://newsviral-html.vercel.app/index.html">Москва</a>
                  <ul class="sub-menu text-muted font-small">
                    <?php foreach ($moscowCategories as $item) { ?>
                      <li><a href="/news/<?= $item->id ?>"><?= $item->name ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li class="menu-item-has-children">
                  <a href="https://newsviral-html.vercel.app/index.html">Мир</a>
                  <ul class="sub-menu text-muted font-small">
                    <?php foreach ($worldCategories as $item) { ?>
                      <li><a href="/news/<?= $item->id ?>"><?= $item->name ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <?php if (0) { ?>
                  <li class="mega-menu-item">
                    <a href="https://newsviral-html.vercel.app/index.html#">
                      <?php if (0) { ?>
                        <span class="mr-15">
                                  <ion-icon name="desktop-outline" role="img" class="md hydrated"
                                            aria-label="desktop outline"><template
                                      shadowrootmode="open"><div class="icon-inner"><svg
                                          xmlns="http://www.w3.org/2000/svg"
                                          class="ionicon s-ion-icon" viewBox="0 0 512 512"><rect
                                            x="32" y="64" width="448" height="320" rx="32" ry="32"
                                            stroke-linejoin="round"
                                            class="ionicon-fill-none ionicon-stroke-width"></rect><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M304 448l-8-64h-80l-8 64h96z"
                                            class="ionicon-stroke-width"></path><path
                                            stroke-linecap="round" stroke-linejoin="round"
                                            d="M368 448H144"
                                            class="ionicon-fill-none ionicon-stroke-width"></path><path
                                            d="M32 304v48a32.09 32.09 0 0032 32h384a32.09 32.09 0 0032-32v-48zm224 64a16 16 0 1116-16 16 16 0 01-16 16z"></path></svg></div></template></ion-icon>
                        </span>
                      <?php } ?>
                      Layouts
                    </a>
                    <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                      <ul class="col-md-2">
                        <li><strong>Archive layout</strong></li>
                        <li><a href="https://newsviral-html.vercel.app/category.html">Category list</a></li>
                        <li><a href="https://newsviral-html.vercel.app/category-grid.html">Category grid</a></li>
                        <li><a href="https://newsviral-html.vercel.app/category-big.html">Category big</a></li>
                        <li><a href="https://newsviral-html.vercel.app/category-metro.html">Category metro</a></li>
                      </ul>
                      <ul class="col-md-2">
                        <li><strong>Post format</strong></li>
                        <li><a href="https://newsviral-html.vercel.app/single.html">Post standard</a></li>
                        <li><a href="https://newsviral-html.vercel.app/single-video.html">Post video</a></li>
                        <li><a href="https://newsviral-html.vercel.app/single-gallery.html">Post gallery</a></li>
                        <li><a href="https://newsviral-html.vercel.app/single-audio.html">Post audio</a></li>
                        <li><a href="https://newsviral-html.vercel.app/single-image.html">Post image</a></li>
                        <li><a href="https://newsviral-html.vercel.app/single-full.html">Post full width</a></li>
                      </ul>
                      <ul class="col-md-2">
                        <li><strong>Pages</strong></li>
                        <li><a href="https://newsviral-html.vercel.app/typography.html">Typography</a></li>
                        <li><a href="https://newsviral-html.vercel.app/about.html">About us</a></li>
                        <li><a href="https://newsviral-html.vercel.app/contact.html">Contact us</a></li>
                        <li><a href="https://newsviral-html.vercel.app/search.html">Search</a></li>
                        <li><a href="https://newsviral-html.vercel.app/author.html">Author</a></li>
                        <li><a href="https://newsviral-html.vercel.app/404.html">404 page</a></li>
                      </ul>
                      <div class="col-md-6 text-right">
                        <a href="https://newsviral-html.vercel.app/index.html#"><img class="border-radius-10"
                                                                                     src="images/ads-2.jpg" alt=""></a>
                      </div>
                    </div>
                  </li>
                  <li class="mega-menu-item">
                    <a href="https://newsviral-html.vercel.app/category.html">
                      <?php if (0) { ?>
                        <span class="mr-15">
                                                    <ion-icon name="megaphone-outline" role="img" class="md hydrated"
                                                              aria-label="megaphone outline"><template
                                                        shadowrootmode="open"><div class="icon-inner"><svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="ionicon s-ion-icon" viewBox="0 0 512 512"><path
                                                              d="M407.94 52.22S321.3 160 240 160H80a16 16 0 00-16 16v96a16 16 0 0016 16h160c81.3 0 167.94 108.23 167.94 108.23 6.06 8 24.06 2.52 24.06-9.83V62c0-12.31-17-18.82-24.06-9.78zM64 256s-16-6-16-32 16-32 16-32M448 246s16-4.33 16-22-16-22-16-22M256 160v128M112 160v128"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              class="ionicon-fill-none ionicon-stroke-width"></path><path
                                                              d="M144 288v168a8 8 0 008 8h53a16 16 0 0015.29-20.73C211.91 416.39 192 386.08 192 336h16a16 16 0 0016-16v-16a16 16 0 00-16-16h-16"
                                                              stroke-linecap="round" stroke-linejoin="round"
                                                              class="ionicon-fill-none ionicon-stroke-width"></path></svg></div></template></ion-icon>
                                                </span>
                      <?php } ?>
                      Mega</a>
                    <div class="sub-mega-menu">
                      <div class="nav flex-column nav-pills" role="tablist">
                        <a class="nav-link active" data-toggle="pill"
                           href="https://newsviral-html.vercel.app/index.html#news-0" role="tab">All</a>
                        <a class="nav-link" data-toggle="pill"
                           href="https://newsviral-html.vercel.app/index.html#news-1"
                           role="tab">Entertaiment</a>
                        <a class="nav-link" data-toggle="pill"
                           href="https://newsviral-html.vercel.app/index.html#news-2"
                           role="tab">Fashion</a>
                        <a class="nav-link" data-toggle="pill"
                           href="https://newsviral-html.vercel.app/index.html#news-3"
                           role="tab">Life Style</a>
                      </div>
                      <div class="tab-content">
                        <div class="tab-pane show active" id="news-0" role="tabpanel">
                          <div class="row">
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-1.jpg" alt="">
                                </a>
                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not
                                  actors </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-2.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think
                                  twice</h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-3.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight,
                                  Bonanza </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-8.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of
                                  matches </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="news-1" role="tabpanel">
                          <div class="row">
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-5.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not
                                  actors </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-6.jpg" alt="">
                                </a>
                                <span class="top-right-icon background3">
                                                                        <i class="mdi mdi-videocam"></i>
                                                                    </span>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think
                                  twice</h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-7.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight,
                                  Bonanza </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-8.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of
                                  matches </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="news-2" role="tabpanel">
                          <div class="row">
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-9.jpg" alt="">
                                </a>
                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not
                                  actors </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-10.jpg" alt="">
                                </a>
                                <span class="top-right-icon background8">
                                                                        <i class="mdi mdi-favorite"></i>
                                                                    </span>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think
                                  twice</h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-11.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight,
                                  Bonanza </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-12.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of
                                  matches </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="news-3" role="tabpanel">
                          <div class="row">
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-13.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not
                                  actors </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-14.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think
                                  twice</h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-15.jpg" alt="">
                                </a>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight,
                                  Bonanza </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                            <div class="col-3 post-module-1">
                              <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                <a href="https://newsviral-html.vercel.app/single.html">
                                  <img src="images/news-16.jpg" alt="">
                                </a>
                                <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                              </div>
                              <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of
                                  matches </h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                  <span class="post-on">25 April</span>
                                  <span class="hit-count has-dot">126k Views</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>

                <?php } ?>
                <?php foreach ($categoryWithoutCity as $item) { ?>
                  <li>
                    <a href="<?= '/news/'.$item->id ?>"><?= $item->name ?></a>
                  </li>
                <?php } ?>
              </ul>
              <?php if (0) { ?>
                <div class="d-inline ml-50 tools-icon">
                  <a class="red-tooltip text-danger" href="https://newsviral-html.vercel.app/index.html#"
                     data-toggle="tooltip" data-placement="top" title="" data-original-title="Hot Topics">
                    <ion-icon name="flame-outline" role="img" class="md hydrated" aria-label="flame outline">
                      <template shadowrootmode="open">
                        <div class="icon-inner">
                          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon" viewBox="0 0 512 512">
                            <path d="M112 320c0-93 124-165 96-272 66 0 192 96 192 272a144 144 0 01-288 0z"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="ionicon-fill-none ionicon-stroke-width"></path>
                            <path d="M320 368c0 57.71-32 80-64 80s-64-22.29-64-80 40-86 32-128c42 0 96 70.29 96 128z"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  class="ionicon-fill-none ionicon-stroke-width"></path>
                          </svg>
                        </div>
                      </template>
                    </ion-icon>
                  </a>
                  <a class="red-tooltip text-primary" href="https://newsviral-html.vercel.app/index.html#"
                     data-toggle="tooltip" data-placement="top" title="" data-original-title="Trending">
                    <ion-icon name="flash-outline" role="img" class="md hydrated" aria-label="flash outline">
                      <template shadowrootmode="open">
                        <div class="icon-inner">
                          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon" viewBox="0 0 512 512">
                            <path
                              d="M315.27 33L96 304h128l-31.51 173.23a2.36 2.36 0 002.33 2.77h0a2.36 2.36 0 001.89-.95L416 208H288l31.66-173.25a2.45 2.45 0 00-2.44-2.75h0a2.42 2.42 0 00-1.95 1z"
                              stroke-linecap="round" stroke-linejoin="round"
                              class="ionicon-fill-none ionicon-stroke-width"></path>
                          </svg>
                        </div>
                      </template>
                    </ion-icon>
                  </a>
                  <a class="red-tooltip text-success" href="https://newsviral-html.vercel.app/index.html#"
                     data-toggle="tooltip" data-placement="top" title="" data-original-title="Notifications">
                    <ion-icon name="notifications-outline" role="img" class="md hydrated"
                              aria-label="notifications outline">
                      <template shadowrootmode="open">
                        <div class="icon-inner">
                          <svg xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon" viewBox="0 0 512 512">
                            <path
                              d="M427.68 351.43C402 320 383.87 304 383.87 217.35 383.87 138 343.35 109.73 310 96c-4.43-1.82-8.6-6-9.95-10.55C294.2 65.54 277.8 48 256 48s-38.21 17.55-44 37.47c-1.35 4.6-5.52 8.71-9.95 10.53-33.39 13.75-73.87 41.92-73.87 121.35C128.13 304 110 320 84.32 351.43 73.68 364.45 83 384 101.61 384h308.88c18.51 0 27.77-19.61 17.19-32.57zM320 384v16a64 64 0 01-128 0v-16"
                              stroke-linecap="round" stroke-linejoin="round"
                              class="ionicon-fill-none ionicon-stroke-width"></path>
                          </svg>
                        </div>
                      </template>
                    </ion-icon>
                    <span class="notification bg-success">5</span>
                  </a>
                </div>
              <?php } ?>
            </nav>
          </div>
          <!-- Search -->
          <?php if(0) { ?>
          <form action="https://newsviral-html.vercel.app/index.html#" method="get"
                class="search-form d-lg-inline float-right position-relative mr-30 d-none">
            <input type="text" class="search_field" placeholder="Search" value="" name="s">
            <span class="search-icon"><i class="ti-search mr-5"></i></span>
          </form>
          <!-- Off canvas -->
          <div class="off-canvas-toggle-cover">
            <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
              <ion-icon name="grid-outline" role="img" class="md hydrated" aria-label="grid outline">
                <template shadowrootmode="open">
                  <div class="icon-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon s-ion-icon" viewBox="0 0 512 512">
                      <rect x="48" y="48" width="176" height="176" rx="20" ry="20" stroke-linecap="round"
                            stroke-linejoin="round" class="ionicon-fill-none ionicon-stroke-width"></rect>
                      <rect x="288" y="48" width="176" height="176" rx="20" ry="20" stroke-linecap="round"
                            stroke-linejoin="round" class="ionicon-fill-none ionicon-stroke-width"></rect>
                      <rect x="48" y="288" width="176" height="176" rx="20" ry="20" stroke-linecap="round"
                            stroke-linejoin="round" class="ionicon-fill-none ionicon-stroke-width"></rect>
                      <rect x="288" y="288" width="176" height="176" rx="20" ry="20" stroke-linecap="round"
                            stroke-linejoin="round" class="ionicon-fill-none ionicon-stroke-width"></rect>
                    </svg>
                  </div>
                </template>
              </ion-icon>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>
