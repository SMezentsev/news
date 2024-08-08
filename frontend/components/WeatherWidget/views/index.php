<div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30">
  <div class="d-flex">
    <div class="font-medium">
      <p><?= $day ?></p>
      <h2><?= $date ?></h2>
      <p><strong><?= $month ?></strong></p>
    </div>
    <div class="font-medium weather ml-10">
      <div id="datetime" class="d-inline-block" style="overflow: hidden; position: relative; height: 90px">
        <ul>
        <?php foreach ($weatherList as $item) { ?>
          <li>
            <span class="font-small">
            <span class="text-success"><?= $item->city->name ?></span><br>
            <?= $item->type->icon ?>
              <?= $item->value ?>ºc
            </span>
            <p style="width:40px"><?= $item->type->name ?></p>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
