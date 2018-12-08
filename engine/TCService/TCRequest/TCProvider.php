<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TCService\TCRequest;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCRequest\TCRequest;

/**
 * Class TCProvider
 *
 * @package Engine\TCService\TCProvider
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcRequest';


  /**
   * @return mixed
   */
  public function tcInit() {
    $request = new TCRequest();
    $this->tcDi->tcSet($this->tcServiceName, $request);
  }
}