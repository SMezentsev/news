<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
use common\models\NewsCategory;

$parent = NewsCategory::find()->where(['id' => $category->parent_id])->one();
$categories = NewsCategory::find()->where(['parent_id' => $category->parent_id])->orderBy('sort ASC')->all();

?>

<div class="entry-meta category-menu meta-0 font-small mb-30">
  <a href="<?= '/news/'.($parent->id??$category->id) ?>"><span class="post-cat"><?= $parent->name??$category->name ?></span></a>:
  <?php if($parent) { ?>

    <?php foreach ($categories as $item) { ?>
      <a href="<?= '/news/'.$item->id ?>"><span class="post-cat <?= $category->id == $item->id ? 'active' : ''?>"><?= $item->name ?></span></a>
    <?php } ?>
  <?php } ?>
</div>
