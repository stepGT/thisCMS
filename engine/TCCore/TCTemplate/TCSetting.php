<?php

namespace Engine\TCCore\TCTemplate;

use Admin\TCModel\TCSetting\TCSettingRepository;
use Engine\TCDI\TCDI;

class TCSetting {

  protected static $di;

  protected static $settingRepository;

  /**
   * TCSetting constructor.
   *
   * @param $di
   */
  public function __construct($di) {
    self::$di = $di;
    self::$settingRepository = new TCSettingRepository(self::$di);
  }

  /**
   * @param $keyField
   *
   * @return mixed
   */
  public static function TCSettingGet($keyField) {
    return self::$settingRepository->TCSettingRepositoryGetSettingValue($keyField);
  }
}