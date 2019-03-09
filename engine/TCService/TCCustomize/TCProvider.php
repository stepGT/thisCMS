<?php

namespace Engine\TCService\TCCustomize;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCCustomize\TCCustomize;

class TCProvider extends TCAbstractProvider {

  /**
   * @var string
   */
  public $serviceName = 'customize';

  /**
   * @return mixed
   */
  public function tcInit() {
    $customize = new TCCustomize($this->tcDi);
    $this->tcDi->tcSet($this->serviceName, $customize);
    return $this;
  }
}
