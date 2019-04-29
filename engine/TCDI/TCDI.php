<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/14/2018
 * Time: 10:51 PM
 */

namespace Engine\TCDI;

/**
 * Class TCDI
 *
 * @package Engine\TCDI
 */
class TCDI {

  /**
   * @var array
   */
  private $tcContainer = [];

  /**
   * @param $tcKey
   * @param $tcValue
   *
   * @return $this
   */
  public function tcSet($tcKey, $tcValue) {
    $this->tcContainer[$tcKey] = $tcValue;
    return $this;
  }

  /**
   * @param $tcKey
   *
   * @return mixed
   */
  public function tcGet($tcKey) {
    return $this->tcHas($tcKey) ? $this->tcContainer[$tcKey] : NULL;
  }

  /**
   * @param $tcKey
   *
   * @return bool
   */
  public function tcHas($tcKey) {
    return isset($this->tcContainer[$tcKey]);
  }

  /**
   * @param $key
   * @param $value
   */
  /*public function TCDIPush($key, $element = []) {
    //
    if ($this->tcHas($key) !== NULL) {
      $this->tcSet($key, []);
    }
    if (!empty($element)) {
      $this->tcContainer[$key][$element['key']] = $element['value'];
    }
  }*/
}