<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:08 AM
 */

namespace Engine\TCService;

use Engine\TCDI\TCDI;

/**
 * Class TCAbstractProvider
 *
 * @package Engine\TCService
 */
abstract class TCAbstractProvider {

  /**
   * @var \Engine\TCDI\TCDI
   */
  protected $tcDi;

  /**
   * TCAbstractProvider constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi = $tcDi;
  }

  /**
   * @return mixed
   */
  abstract function tcInit();
}