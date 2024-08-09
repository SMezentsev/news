<?php

use Carbon\Carbon;
use common\Helper\DateHelper;

?>
<div class="sidebar-widget mb-50">

  <div class="post-aside-style-2">
    <ul class="list-post">
      <?php foreach ($news as $item) { ?>
        <li class="mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
          <div class="d-flex">
            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
              <a class="color-white" href="<?= '/news/'.$item->category_id.'/'.$item->id ?>">
                <img src="<?= $item->files->resize_image1 ?? ''; ?>" alt="">
              </a>
            </div>
            <div class="post-content media-body">
              <h6 class="post-title mb-10 text-limit-2-row">
                <a href="<?= '/news/'.$item->category_id.'/'.$item->id ?>"><?= $item->title ?></a></h6>
              <div class="entry-meta meta-1 font-x-small color-grey float-left">
                <span class="post-on">
                <?= intval(Carbon::parse($item->date)->format('d')); ?>
                <?= DateHelper::months(Carbon::parse($item->date)->format('m'), false) ?>
                <?= Carbon::parse($item->date)->format('y'); ?>
                </span>
              </div>
            </div>
          </div>
        </li>
      <?php }?>

    </ul>
  </div>
</div>
