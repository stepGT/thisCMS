<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TCService\TCConfig;

use Engine\TCService\TCAbstractProvider;
use Engine\TCCore\TCConfig\TCConfig;

/**
 * Class TCAbstractProvider
 *
 * @package Engine\TCService\TCDatabase
 */
class TCProvider extends TCAbstractProvider {

  public $tcServiceName = 'tcConfig';


  /**
   * @return mixed
   */
  public function tcInit() {
    $config['main']     = TCConfig::file('TCMain');
    $config['database'] = TCConfig::file('TCDatabase');
    $this->tcDi->tcSet($this->tcServiceName, $config);
  }
}