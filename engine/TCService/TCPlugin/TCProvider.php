<?php

namespace Engine\TCService\TCPlugin;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCPlugin\TCPlugin;

class TCProvider extends TCAbstractProvider {

  /**
   * @var string
   */
  public $serviceName = 'tcPlugin';

  /**
   * @return mixed
   */
  public function tcInit() {
    $plugin = new TCPlugin($this->tcDi);
    $this->tcDi->tcSet($this->serviceName, $plugin);
    return $this;
  }
}