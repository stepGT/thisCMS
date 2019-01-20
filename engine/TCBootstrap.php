<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/14/2018
 * Time: 10:50 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/TCFunction.php';

use Engine\TCApp;
use Engine\TCDI\TCDI;

try {
  // Dependency injection
  $tcDi = new TCDI();
  $services = require __DIR__ . '/TCConfig/TCService.php';
  // Init services
  foreach ($services as $service) {
    $provider = new $service($tcDi);
    $provider->tcInit();
  }
  $app = new TCApp($tcDi);
  $app->tcRun();
} catch (\ErrorException $e) {
  echo $e->getMessage();
}