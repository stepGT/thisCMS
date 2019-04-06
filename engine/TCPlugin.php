<?php

namespace Engine;

use Engine\TCCore\TCDatabase\TCConnection;
use Engine\TCCore\TCRouter\TCRouter;
use Engine\TCDI\TCDI;

/**
 * Class Plugin
 *
 * @package Engine
 */
abstract class TCPlugin {

  /**
   * @var TCDI
   */
  protected $di;

  /**
   * @var TCConnection
   */
  protected $db;

  /**
   * @var TCRouter
   */
  protected $router;

  /**
   * Plugin constructor.
   *
   * @param TCDI $di
   */
  public function __construct(TCDI $di) {
    $this->di = $di;
    $this->db = $this->di->tcGet('db');
    $this->router = $this->di->tcGet('router');
    $this->customize = $this->di->tcGet('customize');
  }

  abstract public function details();

  /**
   * @return TCDI
   */
  public function getDI() {
    return $this->di;
  }

  /**
   * @return TCConnection
   */
  public function getDb() {
    return $this->db;
  }

  /**
   * @return TCRouter
   */
  public function getRouter() {
    return $this->router;
  }
}
