<?php

namespace Engine;

use Engine\TCCore\TCDatabase\TCConnection;
use Engine\TCDI\TCDI;

/**
 * Class TCService
 *
 * @package Engine
 */
abstract class TCService {

  /**
   * @var TCDI
   */
  protected $di;

  /**
   * @var TCConnection
   */
  protected $db;

  /**
   * @var TCLoad
   */
  protected $load;

  /**
   * @var TCModel
   */
  protected $model;

  /**
   * Service constructor.
   *
   * @param TCDI $di
   */
  public function __construct(TCDI $di) {
    $this->di = $di;
    $this->db = $this->di->tcGet('db');
    $this->load = $this->di->tcGet('load');
    $this->model = $this->di->tcGet('model');
  }

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
   * @return TCLoad
   */
  public function getLoad() {
    return $this->load;
  }

  /**
   * @param $name
   *
   * @return object
   */
  public function getModel($name) {
    $this->load->model(ucfirst($name), FALSE, 'Admin');
    $model = $this->getDI()->tcGet('model');
    return $model->{lcfirst($name)};
  }
}
