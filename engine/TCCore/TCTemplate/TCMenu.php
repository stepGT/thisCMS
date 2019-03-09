<?php


namespace Engine\TCCore\TCTemplate;

use Engine\TCDI\TCDI;
use App\TCModel\TCMenu\TCMenuRepository;
use App\TCModel\TCMenuItem\TCMenuItemRepository;

class TCMenu {

  protected static $di;

  protected static $menuRepository;

  protected static $menuItemRepository;

  /**
   * TCMenu constructor.
   *
   * @param $di
   */
  public function __construct($di) {
    self::$di = $di;
    self::$menuRepository     = new TCMenuRepository(self::$di);
    self::$menuItemRepository = new TCMenuItemRepository(self::$di);
  }

  /**
   * @return mixed
   */
  public static function getItems($menuId) {
    return self::$menuItemRepository->getItems($menuId);
  }
}