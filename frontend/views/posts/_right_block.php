<?php

use common\models\NewsCategory;
use common\models\News;

$healthCategory = NewsCategory::find()->where(['eng_name' => 'health'])->one();
$health = News::find()->where(['category_id' => $healthCategory->id])->limit(5)->all();

?>
<?= $this->render('@frontend/views/site/_subscribe.php') ?>
<div class="sidebar-widget mb-30">
  <div class="widget-header position-relative mb-30">
    <div class="row">
      <div class="col-7">
        <h4 class="widget-title mb-0">Для <span>здоровья</span></h4>
      </div>
      <?php if(0) { ?>
      <div class="col-5 text-right">
        <h6 class="font-medium pr-15">
          <a class="text-muted font-small" href="#">View
            all</a>
        </h6>
      </div>
      <?php } ?>
    </div>
  </div>
  <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
    <ul class="list-post">
      <?php foreach ($health as $item) { ?>
        <li class="mb-20">
          <div class="d-flex">
            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
              <a class="color-white" href="<?= 'news/'.$item->category->id.'/'. $item->id ?>">
                <img src="<?= $item->files->resize_image1 ?>" alt="">
              </a>
            </div>
            <div class="post-content media-body">
              <h6 class="post-title mb-10 text-limit-2-row"><a
                  href="<?= 'news/'.$item->category->id.'/'. $item->id ?>"><?= $item->title ?></a></h6>
            </div>
          </div>
        </li>
      <?php }?>
    </ul>
  </div>
</div>



<div class="sidebar-widget mb-30">
  <div class="widget-header mb-20">
    <h5 class="widget-title">Популярные <span>новости</span></h5>
  </div>
  <div class="post-aside-style-3">

    <?php
      $populars = \common\models\News::find()->orderBy('views DESC')->limit(4)->all();
    ?>

    <?php foreach ($populars as $item) { ?>

      <?= $this->render('@frontend/views/articles/_article_380.php', [
        'news' => $item
      ]) ?>
    <?php } ?>

  </div>
</div>
