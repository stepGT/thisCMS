<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/20/2018
 * Time: 11:14 PM
 */

namespace Engine;

use Engine\TCCore\TCRouter\TCDispatchedRoute;
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
    try {
      $this->tcRouter->tcAdd('home', '/', 'TCHomeController:tcIndex');
      $this->tcRouter->tcAdd('news', '/news', 'TCHomeController:tcNews');
      $this->tcRouter->tcAdd('news_single', '/news/(id:int)', 'TCHomeController:tcNews');

      $tcRouterDispatch = $this->tcRouter->tcDispatch(TCCommon::tcGetMethod(), TCCommon::tcGetPathUrl());
      // 404
      if ($tcRouterDispatch == NULL) {
        $tcRouterDispatch = new TCDispatchedRoute('TCErrorController:tcPage404');
      }
      list($tcClass, $tcAction) = explode(':', $tcRouterDispatch->getTcController(), 2);
      $tcController = '\\App\\TCController\\' . $tcClass;
      $tcParameters = $tcRouterDispatch->getTcParameters();
      //
      call_user_func_array([
        new $tcController($this->tcDi),
        $tcAction,
      ], $tcParameters);
    } catch (\Exception $e) {
      $e->getMessage();
      exit;
    }
  }
}