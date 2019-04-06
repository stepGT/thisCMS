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
    $directory = $this->TCControllerGetRequest()->TCRequestPost('directory');
    //
    if ($directory !== NULL) {
      $this->TCControllerGetPlugin()->TCPluginInstall($directory);
    }
  }

  /**
   *
   */
  public function TCPluginControllerAjaxActivate() {
    $pluginId = $this->TCControllerGetRequest()->TCRequestPost('id');
    $active = $this->TCControllerGetRequest()->TCRequestPost('active');
    if ($pluginId !== NULL) {
      $this->TCControllerGetPlugin()->TCPluginActivate($pluginId, $active);
    }
  }
}