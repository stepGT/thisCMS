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
   * @param $tcMethod
   * @param $tcPattern
   * @param $tcController
   */
  public function tcRegister($tcMethod, $tcPattern, $tcController) {
    $this->tcRoutes[strtoupper($tcMethod)][$tcPattern] = $tcController;
  }

  /**
   * @param $tcKey
   * @param $tcPattern
   */
  public function tcAddPattern($tcKey, $tcPattern) {
    $this->tcPatterns[$tcKey] = $tcPattern;
  }

  /**
   * @param $tcMethod
   * @param $tcUri
   *
   * @return \Engine\TCCore\TCRouter\TCDispatchedRoute
   */
  public function tcDispatch($tcMethod, $tcUri) {
    $tcRoutes = $this->tcRoutes(strtoupper($tcMethod));
    //
    if (array_key_exists($tcUri, $tcRoutes)) {
      return new TCDispatchedRoute($tcRoutes[$tcUri]);
    }
    return $this->tcDoDispatcher($tcMethod, $tcUri);
  }


  /**
   * @param $tcMethod
   * @param $tcUri
   *
   * @return \Engine\TCCore\TCRouter\TCDispatchedRoute
   */
  private function tcDoDispatcher($tcMethod, $tcUri) {
    //
    foreach($this->tcRoutes($tcMethod) as $tcRoute => $tcController) {
      /*$tcPattern = '#^' . $tcRoute . '$#s';
      if(preg_match($tcPattern, $tcUri, $tcParameters)) {
        return new TCDispatchedRoute($tcController, $tcParameters);
      }*/
    }
  }
}