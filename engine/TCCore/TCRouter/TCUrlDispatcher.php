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
    $tcConvert = $this->tcConvertPattern($tcPattern);
    $this->tcRoutes[strtoupper($tcMethod)][$tcConvert] = $tcController;
  }

  /**
   * @param $tcPattern
   *
   * @return mixed
   */
  private function tcConvertPattern($tcPattern) {
    //
    if (strpos($tcPattern, '(') === FALSE) {
      return $tcPattern;
    }
    return preg_replace_callback('#\((\w+):(\w+)\)#', [
      $this,
      'tcReplacePattern',
    ], $tcPattern);
  }

  /**
   * @param $tcMatches
   *
   * @return string
   */
  private function tcReplacePattern($tcMatches) {
    return '(?<' . $tcMatches[1] . '>' . strtr($tcMatches[2], $this->tcPatterns) . ')';
  }

  /**
   * @param $tcParameters
   *
   * @return mixed
   */
  private function tcProcessParam($tcParameters) {
    foreach ($tcParameters as $tcKey => $tcValue) {
      if (is_int($tcKey)) {
        unset($tcParameters[$tcKey]);
      }
    }
    return $tcParameters;
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
    foreach ($this->tcRoutes($tcMethod) as $tcRoute => $tcController) {
      $tcPattern = '#^' . $tcRoute . '$#s';
      //
      if (preg_match($tcPattern, $tcUri, $tcParameters)) {
        return new TCDispatchedRoute($tcController, $this->tcProcessParam($tcParameters));
      }
    }
  }
}