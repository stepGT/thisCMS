<?php

namespace Admin\TCModel\TCPlugin;

use Engine\TCCore\TCDatabase\TCActiveRecord;

class TCPlugin {

  use TCActiveRecord;

  protected $table = 'tc_plugin';

  /**
   * @var int
   */
  public $id;

  /**
   * @var string
   */
  public $directory;

  /**
   * @var int
   */
  public $is_active;

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
   * @return string
   */
  public function getDirectory() {
    return $this->directory;
  }

  /**
   * @param string $directory
   */
  public function setDirectory($directory) {
    $this->directory = $directory;
  }

  /**
   * @return int
   */
  public function getIsActive() {
    return $this->is_active;
  }

  /**
   * @param int $is_active
   */
  public function setIsActive($is_active) {
    $this->is_active = $is_active;
  }
}
