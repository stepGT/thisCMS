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
    /** @var TCPluginRepository $pluginModel */
    $pluginModel = $this->getModel('TCPlugin');
    //
    if (!$pluginModel->TCPluginRepositoryIsInstallPlugin($directory)) {
      $pluginModel->TCPluginRepositoryAddPlugin($directory);
    }
  }

  public function TCPluginActivate($id, $active) {
    $this->getLoad()->tcModel('TCPlugin');
    /** @var TCPluginRepository $pluginModel */
    $pluginModel = $this->getModel('TCPlugin');
    $pluginModel->TCPluginRepositoryActivatePlugin($id, $active);
  }

  public function TCPluginGetActivePlugins() {
    $this->getLoad()->tcModel('TCPlugin');
    /** @var TCPluginRepository $pluginModel */
    $pluginModel = $this->getModel('TCPlugin');
    return $pluginModel->TCPluginRepositoryGetActivePlugins();
  }
}
