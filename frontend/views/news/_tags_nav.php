
<div class="entry-bottom mt-0 mb-30">
  <div class="overflow-hidden mt-0">

  <div class="tags tags-nav float-left text-muted mb-md-30">
    <span class="font-small mr-10"><i class="fa fa-tag mr-5"></i>Теги: </span>

  <?php if (0) { ?>
    <?php foreach ($tags as $item) { ?>
      <a href="/news/tags/<?= $item->id ?>" class="<?= $current == $item->id ? 'active' : '' ?>" rel="tag"><?= $item->name ?></a>
    <?php } ?>
  <?php } ?>

        <a href="/news/tags/<?= $current->id ?>" class="active" rel="tag"><?= $current->name ?></a>
  </div>
</div>
</div>








