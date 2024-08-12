<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
?>
<article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn  animated"
         style="visibility: visible; animation-name: fadeIn;">
  <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
    <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
    <a href="<?= '/news/' . $news->category_id . '/' . $news->id ?>">
      <img src="<?= $news->mainFile->original ?? ''; ?>" alt="post-slider">
    </a>
  </div>
  <div class="pr-10 pl-10">
    <?php if(0) { ?>
    <div class="entry-meta mb-30">
      <a class="entry-meta meta-0" href="category.html"><span
          class="post-in background2 text-primary font-x-small">Home decor</span></a>
      <div class="float-right font-small">
                      <span><span class="mr-10 text-muted"><i class="fa fa-eye"
                                                              aria-hidden="true"></i></span>5.8k</span>
        <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-comment"
                                                              aria-hidden="true"></i></span>2.5k</span>
        <span class="ml-30"><span class="mr-10 text-muted"><i class="fa fa-share-alt"
                                                              aria-hidden="true"></i></span>125k</span>
      </div>
    </div>
    <?php } ?>
    <h4 class="post-title mb-20">
      <span class="post-format-icon">
          <?= $news->category->icon??'' ?>
      </span>
      <a href="<?= '/news/' . $news->category_id . '/' . $news->id ?>"><?= $news->title; ?></a></h4>
    <p class="post-exerpt font-medium text-muted mb-15"><?= $news->announce; ?></p>
    <div class="mb-10 overflow-hidden">
      <div class="entry-meta meta-1 font-x-small color-grey float-left">
        <span class="post-on">
            <?= Carbon::parse($news->date)->format('H:i, '); ?>
            <?= intval(Carbon::parse($news->date)->format('d')); ?>
            <?= DateHelper::months(Carbon::parse($news->date)->format('m'), false) ?>
            <?= Carbon::parse($news->date)->format('y'); ?>
        </span>
      </div>
    </div>
  </div>
</article>
