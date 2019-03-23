<div class="ui secondary pointing menu">
  <?php foreach (TCCustomize::getInstance()
                   ->getAdminSettingItems() as $key => $item): ?>
      <a class="item<?php if (\Engine\TCHelper\TCCommon::isLinkActive($key)) {
        echo ' active';
      } ?>" href="<?= $item['urlPath'] ?>">
        <?= $item['title'] ?>
      </a>
  <?php endforeach; ?>
</div>