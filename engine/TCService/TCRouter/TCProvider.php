<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TCService\TCRouter;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCRouter\TCRouter;

/**
 * Class TCProvider
 *
 * @package Engine\TCService\TCProvider
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcRouter';


  /**
   * @return mixed
   */
  public function tcInit() {
    $tcRouter = new TCRouter('http://thiscms/');
    $this->tcDi->tcSet($this->tcServiceName, $tcRouter);
  }
}