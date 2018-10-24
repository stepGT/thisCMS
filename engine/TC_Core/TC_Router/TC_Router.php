<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 6:29 PM
 */

namespace Engine\TC_Core\TC_Router;

class TC_Router {

  private $tc_routes = [];

  private $tc_dispatcher;

  private $tc_host;

  /**
   * TC_Router constructor.
   *
   * @param $tc_host
   */
  public function __construct($tc_host) {
    $this->tc_host = $tc_host;
  }

  /**
   * @param $tc_key
   * @param $tc_pattern
   * @param $tc_controller
   * @param string $tc_method
   */
  public function tc_add($tc_key, $tc_pattern, $tc_controller, $tc_method = 'GET') {
    //
    $this->tc_routes[$tc_key] = [
      'pattern'    => $tc_pattern,
      'controller' => $tc_controller,
      'method'     => $tc_method
    ];
  }

  public function tc_dispatch($tc_method, $tc_uri) {

  }

  public function tc_getDispatcher() {
    //
    if($this->tc_dispatcher == null) {
      //
    }
    return $this->tc_dispatcher;
  }
}