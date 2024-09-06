<?php

use app\components\SliderWidget;
use app\components\ItemsWidget;
use app\components\ProductItemsWidget;
use app\components\VerticalMenuWidget;
use app\components\DropDownLoginFormWidget;
use app\components\HeaderMenuWidget;
use frontend\assets\AppAsset;
use frontend\assets\CustomAsset;
use yii\helpers\ArrayHelper;
use lavrentiev\widgets\toastr\Notification;

use frontend\components\WeatherWidget\WeatherWidget;
use frontend\components\SidebarWidget;
AppAsset::register($this);

//CustomAsset::register($this);

use yii\helpers\Html;

yii\bootstrap4\Progress::widget(['percent' => 60, 'label' => 'test']);

$this->beginPage();


echo newerton\fancybox\FancyBox::widget([
  'target' => 'a[rel=fancybox]',
  'helpers' => true,
  'mouse' => true,
  'config' => [
    'maxWidth' => '90%',
    'maxHeight' => '90%',
    'playSpeed' => 7000,
    'padding' => 0,
    'fitToView' => false,
    'width' => '70%',
    'height' => '70%',
    'autoSize' => false,
    'closeClick' => false,
    'openEffect' => 'elastic',
    'closeEffect' => 'elastic',
    'prevEffect' => 'elastic',
    'nextEffect' => 'elastic',
    'closeBtn' => false,
    'openOpacity' => true,
    'helpers' => [
      'title' => ['type' => 'float'],
      'buttons' => [],
      'thumbs' => ['width' => 68, 'height' => 50],
      'overlay' => [
        'css' => [
          'background' => 'rgba(0, 0, 0, 0.8)'
        ]
      ]
    ],
  ]
])

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<!--<![endif]-->
<head>
  <style data-styles="">
    ion-icon {
      visibility: hidden
    }
    .hydrated {
      visibility: inherit
    }
  </style>
  <?php if(Yii::$app->params['yandexWebmaster']??false) { ?>
  <meta name="yandex-verification" content="2a5623401af2d15e" />
  <?php } ?>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= Html::encode($this->title ? 'MOSOVKA.RU - '.$this->title : 'MOSOVKA.RU - Новостной портал г. Москва') ?></title>
<!--  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.svg">-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
  <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js" data-stencil-namespace="ionicons"></script>
  <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js" data-stencil-namespace="ionicons"></script>
  <?php $this->head() ?>
  <style id="theia-sticky-sidebar-stylesheet-TSS">.theiaStickySidebar:after {
      content: "";
      display: table;
      clear: both;
    }</style>
  <?php if(Yii::$app->params['yandexMetrika']??false) { ?>

    <!-- Top.Mail.Ru counter -->
    <script type="text/javascript">
      var _tmr = window._tmr || (window._tmr = []);
      _tmr.push({id: "3553083", type: "pageView", start: (new Date()).getTime()});
      (function (d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
        ts.src = "https://top-fwz1.mail.ru/js/code.js";
        var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
        if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
      })(document, window, "tmr-code");
    </script>
    <noscript><div><img src="https://top-fwz1.mail.ru/counter?id=3553083;js=na" style="position:absolute;left:-9999px;" alt="Top.Mail.Ru" /></div></noscript>
    <!-- /Top.Mail.Ru counter -->

    <!-- Yandex.Metrika counter -->
  <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new Date();
      for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
      k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(98021012, "init", {
      clickmap:true,
      trackLinks:true,
      accurateTrackBounce:true
    });
  </script>
  <?php } ?>
  <noscript><div><img src="https://mc.yandex.ru/watch/98021012" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
  <!-- /Yandex.Metrika counter -->
</head>


<body style="transform: none; overflow: visible;">

<?php $this->beginBody() ?>

<!-- site -->
<div class="main-wrap" style="transform: none;">

  <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right ps ps--active-x ps--active-y">
    <?php if(0) { ?>
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner">

      <!--Search-->
      <div class="siderbar-widget mb-50 mt-30">
        <form action="#" method="get" class="search-form position-relative">
          <input type="text" class="search_field" placeholder="Search" value="" name="s">
          <span class="search-icon"><i class="ti-search mr-5"></i></span>
        </form>
      </div>

      <!--lastest post-->
      <div class="sidebar-widget mb-50">
        <div class="widget-header mb-30">
          <h5 class="widget-title">Top <span>Trending</span></h5>
        </div>
        <div class="post-aside-style-2">
          <ul class="list-post">
            <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
              <div class="d-flex">
                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                  <a class="color-white" href="#">
                    <img src="./images/thumbnail-2.jpg" alt="">
                  </a>
                </div>
                <div class="post-content media-body">
                  <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Vancouver
                      woman finds pictures and videos of herself online</a></h6>
                  <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                    <span class="post-by">By <a href="#">K. Marry</a></span>
                    <span class="post-on">4m ago</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
              <div class="d-flex">
                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                  <a class="color-white" href="/single.html">
                    <img src="./images/thumbnail-3.jpg" alt="">
                  </a>
                </div>
                <div class="post-content media-body">
                  <h6 class="post-title mb-10 text-limit-2-row"><a href="#">4
                      Things Emotionally Intelligent People Don’t Do</a></h6>
                  <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                    <span class="post-by">By <a href="/author.html">Mr. John</a></span>
                    <span class="post-on">3h ago</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
              <div class="d-flex">
                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                  <a class="color-white" href="/single.html">
                    <img src="./images/thumbnail-5.jpg" alt="">
                  </a>
                </div>
                <div class="post-content media-body">
                  <h6 class="post-title mb-10 text-limit-2-row"><a href="/single.html">Reflections
                      from a Token Black Friend</a></h6>
                  <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                    <span class="post-by">By <a href="/author.html">Kenedy</a></span>
                    <span class="post-on">4h ago</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
              <div class="d-flex">
                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                  <a class="color-white" href="/single.html">
                    <img src="./images/thumbnail-7.jpg" alt="">
                  </a>
                </div>
                <div class="post-content media-body">
                  <h6 class="post-title mb-10 text-limit-2-row"><a href="/single.html">How
                      to Identify a Smart Person in 3 Minutes</a></h6>
                  <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                    <span class="post-by">By <a href="/author.html">Steven</a></span>
                    <span class="post-on">5h ago</span>
                  </div>
                </div>
              </div>
            </li>
            <li class="wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
              <div class="d-flex">
                <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                  <a class="color-white" href="/single.html">
                    <img src="./images/thumbnail-8.jpg" alt="">
                  </a>
                </div>
                <div class="post-content media-body">
                  <h6 class="post-title mb-10 text-limit-2-row"><a href="/single.html">Blackface
                      Minstrel Songs Don’t Belong in Children’s Music Class</a></h6>
                  <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                    <span class="post-by">By <a href="/author.html">J.Smith</a></span>
                    <span class="post-on">5h30 ago</span>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!--Categories-->
      <div class="sidebar-widget widget_tag_cloud mb-50">
        <div class="widget-header tags-close mb-20">
          <h5 class="widget-title mt-5">Tags Cloud</h5>
        </div>
        <div class="tagcloud">
          <a href="">Beauty</a>
          <a href="">Book</a>
          <a href="">Design</a>
          <a href="">Fashion</a>
          <a href="">Lifestyle</a>
          <a href="">Travel</a>
          <a href="">Science</a>
          <a href="">Health</a>
          <a href="">Sports</a>
          <a href="">Arts</a>
          <a href="">Books</a>
          <a href="">Style</a>
        </div>
      </div>

      <!--Ads-->
      <div class="sidebar-widget widget-ads mb-30">
        <div class="widget-header tags-close mb-20">
          <h5 class="widget-title mt-5">Your Ads Here</h5>
        </div>
        <a href="./images/news-1.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
          <img class="border-radius-10" src="./images/ads-1.jpg" alt="">
        </a>
      </div>

    </div>
    <div class="ps__rail-x" style="width: 0px; left: 0px; bottom: 0px;">
      <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; height: 824px; right: 0px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 504px;"></div>
    </div>
    <?php }  ?>
  </aside>
  <div id="preloader-active" style="display: none;">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="text-center">
          <img class="jump mb-50" src="images/loading.svg" alt="">
          <h6>Now Loading</h6>
          <div class="loader">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?= $this->render('@frontend/views/site/_header.php') ?>
  <!--  --><? //= $this->render('@frontend/views/site/_carausel.php') ?>

  <main class="position-relative" style="transform: none;">
    <div class="container" style="transform: none;">
      <?php if(isset(Yii::$app->params['category'])) { ?>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <?= $this->render('@frontend/views/news/_nav.php', ['category' => Yii::$app->params['category']]) ?>
        </div>
      </div>
      <?php } ?>

      <?php if(isset(Yii::$app->params['tags'])) { ?>
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <?= $this->render('@frontend/views/news/_tags_nav.php', ['tags' => Yii::$app->params['tags']['tags'], 'current' => Yii::$app->params['tags']['current']]) ?>
        </div>
      </div>
      <?php } ?>
      <?php if(!in_array(Yii::$app->controller->action->id, ['view'])) { ?>
      <div class="row" style="transform: none;">
      <?php } ?>
        <?php if(!in_array(Yii::$app->controller->action->id, ['view'])) { ?>
        <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

          <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 15px;">
            <?= WeatherWidget::widget(); ?>
            <?= SidebarWidget::widget(['title' => 'Москва', 'eng_name' => 'moscow']); ?>
            <?= SidebarWidget::widget(['categoryIds' => [
              'science', 'culture', 'travel', 'economics', 'sport', 'health'
            ]]); ?>
          </div>

          <?php if(!in_array(Yii::$app->controller->action->id, ['view'])) { ?>
        </div>
          <?php } ?>
        <?php } ?>
        <?= $content ?>
      </div>
    </div>
  </main>

  <?php include_once(Yii::getAlias('@frontend/views/site/_footer.php')); ?>

</div>
<div class="dark-mark"></div>

<?php $this->endBody(); ?>

</body>
</html>
<?php $this->endPage() ?>
