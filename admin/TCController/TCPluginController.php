<?php

namespace Admin\TCController;


class TCPluginController extends TCAdminController {

  /**
   *
   */
  public function TCPluginControllerListPlugins() {
    $this->tcLoad->tcModel('TCPlugin');
    $installedPlugins = $this->tcModel->TCPlugin->TCPluginRepositoryGetPlugins();
    $plugins = TCFunctionGetPlugins();
    //
    foreach ($installedPlugins as $plugin) {
      $plugins[$plugin->directory]['is_active'] = $plugin->is_active;
      $plugins[$plugin->directory]['is_install'] = TRUE;
      $plugins[$plugin->directory]['plugin_id'] = $plugin->plugin_id;
    }
    $this->data['plugins'] = $plugins;
    $this->tcView->tcRender('TCPlugins/list', $this->data);
  }

  /**
   *
   */
  public function TCPluginControllerAjaxInstall() {
    $directory = $this
      ->getRequest()
      ->post('directory');

    if ($directory !== NULL) {
      $this->getPlugin()->install($directory);
    }
  }

  /**
   *
   */
  public function TCPluginControllerAjaxActivate() {
    $pluginId = $this
      ->getRequest()
      ->post('id');

    $active = $this
      ->getRequest()
      ->post('active');

    if ($pluginId !== NULL) {
      $this->getPlugin()->activate($pluginId, $active);
    }
  }
}