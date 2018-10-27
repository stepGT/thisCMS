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

  /**
   * @param $tcMethod
   * @param $tcUri
   *
   * @return mixed
   */
  public function tcDispatch($tcMethod, $tcUri) {
    return $this->tcGetDispatcher()->tcDispatch($tcMethod, $tcUri);
  }

  /**
   * @return \Engine\TCCore\TCRouter\TCUrlDispatcher
   */
  public function tcGetDispatcher() {
    //
    if ($this->tcDispatcher == NULL) {
      $this->tcDispatcher = new TCUrlDispatcher();
      //
      foreach ($this->tcRoutes as $tcRoute) {
        $this->tcDispatcher->tcRegister($tcRoute['method'], $tcRoute['pattern'], $tcRoute['controller']);
      }
    }
    return $this->tcDispatcher;
  }
}