<?php

namespace Engine\TCService\TCLoad;

use Engine\TCService\TCAbstractProvider;
use Engine\TCLoad;

/**
 * Class TCProvider
 *
 * @package Engine\TCService\TCProvider
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcLoad';


  /**
   * @return mixed
   */
  public function tcInit() {
    $tcLoad = new TCLoad($this->tcDi);
    $this->tcDi->tcSet($this->tcServiceName, $tcLoad);
  }
}