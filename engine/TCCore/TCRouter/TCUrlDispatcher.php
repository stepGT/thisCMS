<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 8:09 PM
 */

namespace Engine\TCCore\TCRouter;


class TCUrlDispatcher {

  /**
   * @var array
   */
  private $tcMethods = [
    'GET',
    'POST',
  ];

  /**
   * @var array
   */
  private $tcRoutes = [
    'GET'  => [],
    'POST' => [],
  ];

  /**
   * @var array
   */
  private $tcPatterns = [
    'int' => '[0-9]+',
    'str' => '[a-zA-Z\.\-_%]+',
    'any' => '[a-zA-Z0-9\.\-_%]+',
  ];

  /**
   * @param $tcMethod
   *
   * @return array|mixed
   */
  private function tcRoutes($tcMethod) {
    return isset($this->tcRoutes[$tcMethod]) ? $this->tcRoutes[$tcMethod] : [];
  }

  /**
   * @param $tcKey
   * @param $tcPattern
   */
  public function tcAddPattern($tcKey, $tcPattern) {
    $this->tcPatterns[$tcKey] = $tcPattern;
  }

  public function tcDispatch($tcMethod, $tcUri) {
    $tcRoutes = $this->tcRoutes(strtoupper($tcMethod));
    //
    if (array_key_exists($tcUri, $tcRoutes)) {
      return new TCDispatchedRoute($tcRoutes[$tcUri]);
    }
  }
}