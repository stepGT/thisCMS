<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 2:17 AM
 */

namespace Engine\TC_Service\TC_Router;

use Engine\TC_Service\TC_Abstract_Provider;
use Engine\TC_Core\TC_Router\TC_Router;

/**
 * Class TC_Provider
 *
 * @package Engine\TC_Service\TC_Database
 */
class TC_Provider extends TC_Abstract_Provider {

  public $tc_service_name = 'tc_router';


  /**
   * @return mixed
   */
  public function tc_init() {
    $tc_router = new TC_Router('http://thiscms/');
    $this->di->tc_set($this->tc_service_name, $tc_router);
  }
}