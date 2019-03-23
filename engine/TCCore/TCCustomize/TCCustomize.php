<?php

namespace Engine\TCCore\TCCustomize;

use Engine\TCDI\TCDI;

/**
 * Class Customize
 *
 * @package Engine\Core\Customize
 */
class TCCustomize {

  /**
   * @var \Engine\TCDI\TCDI
   */
  public static $di;

  /**
   * @var config
   */
  protected $config;

  /**
   * @var null|Customize
   */
  private static $instance = NULL;

  /**
   * Customize constructor.
   *
   * @param TCDI $di
   */
  public function __construct(TCDI $di) {
    static::$di   = $di;
    $this->config = new TCConfig();
  }

  /**
   * @return TCConfig
   */
  public function getConfig() {
    return $this->config;
  }

  protected function __clone() {
  }

  /**
   * @return TCCustomize|null
   */
  static public function getInstance() {
    if (is_null(self::$instance)) {
      self::$instance = new self(static::$di);
    }

    return self::$instance;
  }

  /**
   * @return mixed|null
   */
  public function getAdminMenuItems() {
    return $this->getConfig()->get('dashboardMenu');
  }

  /**
   * @return mixed|null
   */
  public function getAdminSettingItems() {
    return $this->getConfig()->get('settingMenu');
  }
}
