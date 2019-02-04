<?php

namespace App\TCModel\TCMenu;

use Engine\TCCore\TCDatabase\TCActiveRecord;

class TCMenu {

  use TCActiveRecord;

  /**
   * @var string
   */
  protected $table = 'tc_menu';

  /**
   * @var $id
   */
  public $id;

  /**
   * @var $name
   */
  public $name;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name) {
    $this->name = $name;
  }
}