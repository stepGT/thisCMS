<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/24/2018
 * Time: 8:42 PM
 */

namespace Engine\TCCore\TCRouter;


class TCDispatchedRoute {

  private $tcController;

  private $tcParameters;

  /**
   * TCDispatchedRoute constructor.
   *
   * @param $tcController
   * @param $tcParameters
   */
  public function __construct($tcController, $tcParameters = []) {
    $this->tcController = $tcController;
    $this->tcParameters = $tcParameters;
  }

  /**
   * @return mixed
   */
  public function getTcController() {
    return $this->tcController;
  }

  /**
   * @return mixed
   */
  public function getTcParameters() {
    return $this->tcParameters;
  }
}