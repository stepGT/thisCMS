<?php


namespace Engine\TCCore\TCTemplate;

use Engine\TCDI\TCDI;
use App\TCModel\TCMenu\TCMenuRepository;

class TCMenu {

  protected static $di;

  protected static $menuRepository;

  /**
   * TCMenu constructor.
   *
   * @param $di
   */
  public function __construct($di) {
    self::$di = $di;
    self::$menuRepository = new TCMenuRepository(self::$di);
  }

  /**
   * @return mixed
   */
  public static function getItems() {
    return self::$menuRepository->getAllItems();
  }
}