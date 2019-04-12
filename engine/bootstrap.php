<?php

require_once __DIR__ . '/../vendor/autoload.php';
//
if (version_compare($ver = PHP_VERSION, $req = THISCMS_PHP_MIN, '<')) {
  die(sprintf('You are running PHP %s, but Flexi needs at least PHP %s to run.', $ver, $req));
}

class_alias('Engine\\TCCore\\TCTemplate\\TCAsset', 'TCAsset');
class_alias('Engine\\TCCore\\TCTemplate\\TCTheme', 'TCTheme');
class_alias('Engine\\TCCore\\TCTemplate\\TCSetting', 'TCSetting');
class_alias('Engine\\TCCore\\TCTemplate\\TCMenu', 'TCMenu');
class_alias('Engine\\TCCore\\TCCustomize\\TCCustomize', 'TCCustomize');

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