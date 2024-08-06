<div class="sidebar-widget widget_categories_2 border-radius-10 bg-white mb-30">
  <?php if($title && !empty($title)) { ?>
  <div class="widget-header position-relative mb-15">
    <h5 class="widget-title"><strong>Москва</strong></h5>
  </div>
  <?php } ?>
  <ul class="font-small text-muted">
    <?php foreach ($categories as $key=>$category) { ?>

      <li class="cat-item cat-item-<?= $key ?>">
        <a href="https://newsviral-html.vercel.app/index.html#">
          <span class="mr-10"><?= $category->icon ?></span><?= $category->name ?></a></li>
    <?php } ?>
  </ul>
</div>
