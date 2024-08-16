
<div class="entry-bottom mt-0 mb-30">
  <div class="overflow-hidden mt-0">

  <div class="tags tags-nav float-left text-muted mb-md-30">
    <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Теги: </span>

  <?php if ($tags) { ?>
    <?php foreach ($tags as $item) { ?>
      <a href="/news/tags/<?= $item->id ?>" class="<?= $current == $item->id ? 'active' : '' ?>" rel="tag"><?= $item->name ?></a>
    <?php } ?>
  <?php } ?>
  </div>
</div>
</div>








