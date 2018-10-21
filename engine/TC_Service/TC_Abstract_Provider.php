<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:08 AM
 */

namespace Engine\TC_Service;

use Engine\TC_DI\TC_DI;

/**
 * Class TC_Abstract_Provider
 *
 * @package Engine\TC_Service
 */
abstract class TC_Abstract_Provider {

  /**
   * @var \Engine\TC_DI\TC_DI
   */
  protected $di;

  /**
   * TC_AbstractProvider constructor.
   *
   * @param \Engine\TC_DI\TC_DI $di
   */
  public function __construct(TC_DI $di) {
    $this->di = $di;
  }

  /**
   * @return mixed
   */
  abstract function tc_init();
}