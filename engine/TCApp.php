<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/20/2018
 * Time: 11:14 PM
 */

namespace Engine;

use Engine\TCHelper\TCCommon;

/**
 * Class TCApp
 *
 * @package Engine
 */
class TCApp {

  private $tcDi;

  public $tcRouter;

  /**
   * TCApp constructor.
   *
   * @param $tcDi
   */
  public function __construct($tcDi) {
    $this->tcDi = $tcDi;
    $this->tcRouter = $this->tcDi->tcGet('tcRouter');
  }

  /**
   * Run ThisCMS
   */
  public function tcRun() {
    $this->tcRouter->tcAdd('home', '/', 'TCHomeController:tcIndex');
    $this->tcRouter->tcAdd('product', '/user/12', 'TCProductController:index');
    $tcRouterDispatch = $this->tcRouter->tcDispatch(TCCommon::tcGetMethod(), TCCommon::tcGetPathUrl());
    list($tcClass, $tcAction) = explode(':', $tcRouterDispatch->getTcController(), 2);
    $tcController = '\\App\\TCController\\' . $tcClass;
    call_user_func_array([new $tcController($this->tcDi), $tcAction],$tcRouterDispatch->getTcParameters());
  }
}