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
      $plugins[$plugin->directory]['plugin_id'] = $plugin->id;
    }
    $this->data['plugins'] = $plugins;
    $this->tcView->tcRender('TCPlugins/list', $this->data);
  }

  /**
   *
   */
  public function TCPluginControllerAjaxInstall() {
    $directory = $this->GetTcRequest()->TCRequestPost('directory');
    //
    if ($directory !== NULL) {
      $this->GetTcPlugin()->TCPluginInstall($directory);
    }
  }

  /**
   *
   */
  public function TCPluginControllerAjaxActivate() {
    $pluginId = $this->GetTcRequest()->TCRequestPost('id');
    $active = $this->GetTcRequest()->TCRequestPost('active');
    if ($pluginId !== NULL) {
      $this->GetTcPlugin()->TCPluginActivate($pluginId, $active);
    }
  }
}