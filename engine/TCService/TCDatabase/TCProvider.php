<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TCService\TCDatabase;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCDatabase\TCConnection;

/**
 * Class TCAbstractProvider
 *
 * @package Engine\TCService\TCDatabase
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcDB';


  /**
   * @return mixed
   */
  public function tcInit() {
    $tcDb = new TCConnection();
    $this->tcDi->tcSet($this->tcServiceName, $tcDb);
  }
}