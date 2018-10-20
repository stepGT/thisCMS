<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/14/2018
 * Time: 10:51 PM
 */

namespace Engine\TC_DI;

/**
 * Class TC_DI
 *
 * @package Engine\TC_DI
 */
class TC_DI {

  /**
   * @var array
   */
  private $container = [];

  /**
   * @param $key
   * @param $value
   *
   * @return $this
   */
  public function tc_set($key, $value) {
    $this->container[$key] = $value;
    return $this;
  }

  /**
   * @param $key
   *
   * @return mixed
   */
  public function tc_get($key) {
    return $this->tc_has($key);
  }

  /**
   * @param $key
   *
   * @return bool
   */
  public function tc_has($key) {
    return isset($this->container[$key]) ? $this->container[$key] : NULL;
  }
}