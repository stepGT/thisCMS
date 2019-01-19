<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TCService\TCView;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCTemplate\TCView;

/**
 * Class TCProvider
 *
 * @package Engine\TCService\TCProvider
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcView';


  /**
   * @return mixed
   */
  public function tcInit() {
    $tcView = new TCView($this->tcDi);
    $this->tcDi->tcSet($this->tcServiceName, $tcView);
  }
}