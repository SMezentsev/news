<div class="sidebar-widget widget-weather border-radius-10 bg-white mb-30 mt-55">
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
          <a class="text-success" href="https://newsviral-html.vercel.app/index.html#"><?= $weather->city->name ?></a><br>
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
