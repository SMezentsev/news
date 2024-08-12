<?php

use common\models\NewsCategory;
use common\models\Category;
use Carbon\Carbon;

$category = NewsCategory::find()->where(['id' => $category_id])->one();
if($category->eng_name == 'all') {
  $parent = NewsCategory::find()->where(['id' => $category->id])->one();
  $parent_id = $parent->id;
} else {
  $parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
  $parent_id = $category->parent_id;
}

$categories = NewsCategory::find()->where(['parent_id' => $parent_id])->orderBy('sort ASC')->all();
?>

<div class="col-lg-10 col-md-9 order-1 order-md-2">

  <div class="row mb-50">
    <div class="col-lg-8 col-md-12">
      <div class="latest-post mb-50">
        <div class="loop-list-style-1">

          <?php if (count($news)) { ?>
            <?= $this->render('@frontend/views/articles/_article_700_first_post.php', ['news' => $news[0]]) ?>

            <?php foreach (array_slice($news, 1) as $item) { ?>
              <?= $this->render('@frontend/views/articles/_article_250_250_announce.php', ['news' => $item]) ?>
            <?php } ?>
          <?php } ?>

        </div>
      </div>

    </div>
    <div class="col-lg-4 col-md-12 sidebar-right">
      <div class="widget-header mb-20">
        <h5 class="widget-title">Популярные <span>новости</span></h5>
      </div>
      <?= $this->render('@frontend/views/articles/_article_without_background', ['news' => $news]) ?>
      <?php if (0) { ?>
        <div class="sidebar-widget mb-50">
          <div class="widget-header mb-30 bg-white border-radius-10 p-15">
            <h5 class="widget-title mb-0">Top <span>Trending</span></h5>
          </div>
          <div class="post-aside-style-2">
            <ul class="list-post">
              <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="d-flex">
                  <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                    <a class="color-white" href="single.html">
                      <img src="assets/imgs/thumbnail-2.jpg" alt="">
                    </a>
                  </div>
                  <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Vancouver woman finds
                        pictures
                        and videos of herself online</a></h6>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                      <span class="post-by">By <a href="author.html">K. Marry</a></span>
                      <span class="post-on">4m ago</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="d-flex">
                  <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                    <a class="color-white" href="single.html">
                      <img src="assets/imgs/thumbnail-3.jpg" alt="">
                    </a>
                  </div>
                  <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">4 Things Emotionally
                        Intelligent People Don’t Do</a></h6>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                      <span class="post-by">By <a href="author.html">Mr. John</a></span>
                      <span class="post-on">3h ago</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="d-flex">
                  <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                    <a class="color-white" href="single.html">
                      <img src="assets/imgs/thumbnail-5.jpg" alt="">
                    </a>
                  </div>
                  <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Reflections from a Token
                        Black
                        Friend</a></h6>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                      <span class="post-by">By <a href="author.html">Kenedy</a></span>
                      <span class="post-on">4h ago</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="mb-30 wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="d-flex">
                  <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                    <a class="color-white" href="single.html">
                      <img src="assets/imgs/thumbnail-7.jpg" alt="">
                    </a>
                  </div>
                  <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">How to Identify a Smart
                        Person
                        in 3 Minutes</a></h6>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                      <span class="post-by">By <a href="author.html">Steven</a></span>
                      <span class="post-on">5h ago</span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="wow fadeIn   animated" style="visibility: visible; animation-name: fadeIn;">
                <div class="d-flex">
                  <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                    <a class="color-white" href="single.html">
                      <img src="assets/imgs/thumbnail-8.jpg" alt="">
                    </a>
                  </div>
                  <div class="post-content media-body">
                    <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Blackface Minstrel Songs
                        Don’t
                        Belong in Children’s Music Class</a></h6>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                      <span class="post-by">By <a href="author.html">J.Smith</a></span>
                      <span class="post-on">5h30 ago</span>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-widget mb-50">
          <div class="widget-header mb-30">
            <h5 class="widget-title">Recent <span>posts</span></h5>
          </div>
          <div class="post-aside-style-3">
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated"
                     style="visibility: visible; animation-name: fadeIn;">
              <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                <a href="single.html">
                  <video autoplay="" class="photo-item__video" loop="" muted="" preload="none">
                    <source
                      src="https://player.vimeo.com/external/210754416.sd.mp4?s=826dbe91a402d3fc239674b6595a0100b2a45098&amp;profile_id=164&amp;oauth2_token_id=57447761"
                      type="video/mp4">
                  </video>
                </a>
              </div>
              <div class="pl-10 pr-10">
                <h5 class="post-title mb-15"><a href="single.html">Vancouver woman finds pictures and videos of
                    herself online</a></h5>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-in">In <a href="category.html">Global</a></span>
                  <span class="post-by">By <a href="author.html">K. Marry</a></span>
                  <span class="post-on">4m ago</span>
                </div>
              </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated"
                     style="visibility: visible; animation-name: fadeIn;">
              <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                <a href="single.html">
                  <img class="border-radius-15" src="assets/imgs/news-22.jpg" alt="">
                </a>
              </div>
              <div class="pl-10 pr-10">
                <h5 class="post-title mb-15"><a href="single.html">Fight breaks out at Disneyland</a></h5>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-in">In <a href="category.html">Healthy</a></span>
                  <span class="post-by">By <a href="author.html">Steven</a></span>
                  <span class="post-on">14m ago</span>
                </div>
              </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated"
                     style="visibility: visible; animation-name: fadeIn;">
              <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                <a href="single.html">
                  <img class="border-radius-15" src="assets/imgs/news-20.jpg" alt="">
                </a>
              </div>
              <div class="pl-10 pr-10">
                <h5 class="post-title mb-15"><a href="single.html">California sheriff’s deputy shot during ‘ambush’
                    at
                    police station, officials say</a></h5>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-in">In <a href="category.html">US</a></span>
                  <span class="post-by">By <a href="author.html">Murler</a></span>
                  <span class="post-on">16m ago</span>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn  animated"
             style="visibility: visible; animation-name: fadeIn;">
          <div class="widget-header mb-30">
            <h5 class="widget-title">Last <span>Comments</span></h5>
          </div>
          <div class="post-block-list post-module-6">
            <div class="last-comment mb-20 d-flex wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                   data-placement="top" title=""
                                                   data-original-title="Azumi - 985 posts"><img
                                                    src="assets/imgs/authors/author-14.png" alt=""></a>
                                            </span>
              <div class="alith_post_title_small">
                <p class="font-medium mb-10"><a href="single.html">A writer is someone for whom writing is more
                    difficult than it is for other people.</a></p>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-by">By <a href="author.html">Azumi</a></span>
                  <span class="post-on">4m ago</span>
                </div>
              </div>
            </div>
            <div class="last-comment mb-20 d-flex wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                   data-placement="top" title=""
                                                   data-original-title="Harry - 1245 posts"><img
                                                    src="assets/imgs/authors/author-9.png" alt=""></a>
                                            </span>
              <div class="alith_post_title_small">
                <p class="font-medium mb-10"><a href="single.html">Riding the main trail was easy, a little bumpy
                    because my mountain bike is a hardtail</a></p>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-by">By <a href="author.html">K. Harry</a></span>
                  <span class="post-on">4m ago</span>
                </div>
              </div>
            </div>
            <div class="last-comment d-flex wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="#" data-toggle="tooltip"
                                                   data-placement="top" title=""
                                                   data-original-title="Johny - 445 posts"><img
                                                    src="assets/imgs/authors/author-3.png" alt=""></a>
                                            </span>
              <div class="alith_post_title_small">
                <p class="font-medium mb-10"><a href="single.html">Teamwork begins by building trust. And the only
                    way
                    to do that is to overcome our need for invulnerability.</a></p>
                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                  <span class="post-by">By <a href="author.html">D. Johny</a></span>
                  <span class="post-on">4m ago</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

