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
   * @var $parent
   */
  public $parent;

  /**
   * @var $position
   */
  public $position;

  /**
   * @var $link
   */
  public $link;

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

  /**
   * @return mixed
   */
  public function getParent() {
    return $this->parent;
  }

  /**
   * @param mixed $parent
   */
  public function setParent($parent) {
    $this->parent = $parent;
  }

  /**
   * @return mixed
   */
  public function getPosition() {
    return $this->position;
  }

  /**
   * @param mixed $position
   */
  public function setPosition($position) {
    $this->position = $position;
  }

  /**
   * @return mixed
   */
  public function getLink() {
    return $this->link;
  }

  /**
   * @param mixed $link
   */
  public function setLink($link) {
    $this->link = $link;
  }
}