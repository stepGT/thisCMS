<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 6:29 PM
 */

namespace Engine\TCCore\TCRouter;

class TCRouter {

  private $tcRoutes = [];

  private $tcDispatcher;

  private $tcHost;

  /**
   * TCRouter constructor.
   *
   * @param $tcHost
   */
  public function __construct($tcHost) {
    $this->tcHost = $tcHost;
  }

  /**
   * @param $tcKey
   * @param $tcPattern
   * @param $tcController
   * @param string $tcMethod
   */
  public function tcAdd($tcKey, $tcPattern, $tcController, $tcMethod = 'GET') {
    //
    $this->tcRoutes[$tcKey] = [
      'pattern'    => $tcPattern,
      'controller' => $tcController,
      'method'     => $tcMethod
    ];
  }

  public function tcDispatch($tcMethod, $tcUri) {

  }

  public function tcGetDispatcher() {
    //
    if ($this->tcDispatcher == NULL) {
      //
    }
    return $this->tcDispatcher;
  }
}