<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/20/2018
 * Time: 11:14 PM
 */

namespace Engine;

/**
 * Class TC_Cms
 *
 * @package Engine
 */
class TC_Cms {

  private $tc_di;

  public $tc_router;

  /**
   * TC_Cms constructor.
   *
   * @param $tc_di
   */
  public function __construct($tc_di) {
    $this->tc_di = $tc_di;
    $this->tc_router = $this->tc_di->tc_get('tc_router');
  }

  /**
   * @param $di
   */
  public function tc_run() {
    //$this->tc_router->tc_add('home', '/', 'TCHomeController:index');
    //$this->tc_router->tc_add('product', '/product{id}', 'TCProductController:index');
    echo 'ThisCMS';
  }
}