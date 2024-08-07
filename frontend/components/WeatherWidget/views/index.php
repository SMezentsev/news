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

          <li style="margin: 0px; padding: 0px; height: 64.4886px;">
          <span class="font-small">
          <span class="text-success"><?= $weather->city->name ?></span><br>
          <?= $weather->type->icon ?>
            <?= $weather->value ?>ºc
          </span>
            <p style="width:40px"><?= $weather->type->name ?></p>
          </li>

          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
