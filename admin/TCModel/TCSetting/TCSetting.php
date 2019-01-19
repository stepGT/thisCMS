<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 1/19/2019
 * Time: 7:58 PM
 */

namespace Admin\TCModel\TCSetting;

use Engine\TCCore\TCDatabase\TCActiveRecord;

class TCSetting {

  use TCActiveRecord;

  /**
   * @var string
   */
  protected $table = 'tc_setting';

  /**
   * @var $id
   */
  public $id;

  /**
   * @var $title
   */
  public $name;

  /**
   * @var $content
   */
  public $key_field;

  /**
   * @var $date
   */
  public $value;


  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param $id
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
   * @param $title
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getKeyField() {
    return $this->key_field;
  }

  /**
   * @param $content
   */
  public function setKeyField($key_field) {
    $this->key_field = $key_field;
  }

  /**
   * @return mixed
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * @param $role
   */
  public function setValue($value) {
    $this->value = $value;
  }
}