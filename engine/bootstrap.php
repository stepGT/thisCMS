<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/14/2018
 * Time: 10:50 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\TC_Cms;
use Engine\TC_DI\TC_DI;

try {
  // Dependency injection
  $di = new TC_DI();
  $services = require __DIR__ . '/TC_Config/TC_Service.php';
  // Init services
  foreach ($services as $service) {
    $provider = new $service($di);
    $provider->tc_init();
  }
  $cms = new TC_Cms($di);
  $cms->tc_run();
} catch (\ErrorException $e) {
  echo $e->getMessage();
}