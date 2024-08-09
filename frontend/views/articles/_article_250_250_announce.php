<?php

use Carbon\Carbon;
use common\Helper\DateHelper;
?>
<article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
  <div class="d-md-flex d-block">
    <div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale">
      <a class="color-white" href="<?= '/news/'.$news->category_id.'/'.$news->id ?>">
        <img class="border-radius-15" src="<?= $news->mainFile->resize_image1 ?? ''; ?>" alt="">
      </a>
    </div>
    <div class="post-content media-body">
      <div class="entry-meta mb-15 mt-10">
        <a class="entry-meta meta-2" href="<?= '/news/'.$news->category_id ?>">
          <span class="post-in text-danger font-x-small"><?= $news->category->name ?></span></a>
      </div>
      <h5 class="post-title mb-15 text-limit-2-row">
        <span class="post-format-icon">
            <ion-icon name="videocam-outline" role="img" class="md hydrated"
                      aria-label="videocam outline"></ion-icon>
        </span>
        <a href="<?= '/news/'.$news->category_id.'/'.$news->id ?>"><?= $news->title ?></a></h5>
      <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block"><?= $news->announce ?></p>

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
