<?php

namespace Engine\TCCore\TCPlugin;

use Admin\TCModel\TCPlugin\TCPluginRepository;
use Engine\TCService;

/**
 * Class TCPlugin
 *
 * @package Engine\TCCore\TCPlugin
 */
class TCPlugin extends TCService {

  public function TCPluginInstall($directory) {
    $this->getLoad()->tcModel('TCPlugin');
    // @var TCPluginRepository $pluginModel
    $pluginModel = $this->getModel('tcPlugin');
    //
    if (!$pluginModel->TCPluginRepositoryIsInstallPlugin($directory)) {
      $pluginModel->TCPluginRepositoryAddPlugin($directory);
    }
  }

  public function TCPluginActivate($id, $active) {
    $this->getLoad()->tcModel('TCPlugin');
    // @var TCPluginRepository $pluginModel
    $pluginModel = $this->getModel('tcPlugin');
    $pluginModel->TCPluginRepositoryActivatePlugin($id, $active);
  }

  public function TCPluginGetActivePlugins() {
    $this->getLoad()->tcModel('Plugin');
    // @var TCPluginRepository $pluginModel
    $pluginModel = $this->getModel('tcPlugin');
    return $pluginModel->TCPluginRepositoryGetActivePlugins();
  }
}
