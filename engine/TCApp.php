<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/20/2018
 * Time: 11:14 PM
 */

namespace Engine;

/**
 * Class TCApp
 *
 * @package Engine
 */
class TCApp {

  private $tcDi;

  public $tcRouter;

  /**
   * TC_Cms constructor.
   *
   * @param $tc_di
   */
  public function __construct($tcDi) {
    $this->tcDi = $tcDi;
    $this->tcRouter = $this->tcDi->tcGet('tc_router');
  }

  /**
   * @param $di
   */
  public function tcRun() {
    //$this->tc_router->tc_add('home', '/', 'TCHomeController:index');
    //$this->tc_router->tc_add('product', '/product{id}', 'TCProductController:index');
    echo 'ThisCMS';
  }
}