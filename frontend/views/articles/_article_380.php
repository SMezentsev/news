<?php

use Carbon\Carbon;
use common\Helper\DateHelper;

?>

<article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
  <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
    <a href="single.html">
      <img class="border-radius-15" src="<?= $news->files->original??'' ?>" alt="">
    </a>
  </div>
  <div class="pl-10 pr-10">
    <h5 class="post-title mb-15"><a href="/news/<?= $news->category_id.'/'. $news->id; ?>"><?= $news->announce??'' ?></a></h5>
    <div class="entry-meta meta-1 font-x-small color-grey float-left mb-10">
      <span class="post-on">
        <?= Carbon::parse($news->date)->format('H:i, '); ?>
        <?= intval(Carbon::parse($news->date)->format('d')); ?>
        <?= DateHelper::months(Carbon::parse($news->date)->format('m'), false) ?>
        <?= Carbon::parse($news->date)->format('y'); ?>
      </span>
    </div>
  </div>
</article>
