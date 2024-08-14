<?php

use common\models\NewsCategory;
use common\models\Category;
use Carbon\Carbon;

//
//$category = NewsCategory::find()->where(['id' => $category_id])->one();
//if($category->eng_name == 'all') {
//  $parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
//  $parent_id = $parent->id;
//} else {
//  $parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
//  $parent_id = $category->parent_id;
//}
//
//$categories = NewsCategory::find()->where(['parent_id' => $parent_id])->orderBy('sort ASC')->all();
?>

<div class="col-lg-10 col-md-9 order-1 order-md-2">

  <div class="row mb-50">
    <div class="col-lg-8 col-md-12">
      <div class="latest-post mb-50">
        <div class="loop-list-style-1">

          <?php if($mode === 'tags') { ?>

            <?php foreach ($news as $item) { ?>
              <?= $this->render('@frontend/views/articles/_article_250_250_announce.php', ['news' => $item]) ?>
            <?php } ?>

          <?php } else { ?>

            <?php if (count($news)) { ?>

              <?= $this->render('@frontend/views/articles/_article_700_first_post.php', ['news' => $news[0]]) ?>
              <?php foreach (array_slice($news, 1) as $item) { ?>
                <?= $this->render('@frontend/views/articles/_article_250_250_announce.php', ['news' => $item]) ?>
              <?php } ?>

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
    </div>
  </div>
</div>

