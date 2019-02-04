<?php


namespace App\TCModel\TCMenuItem;

use Engine\TCModel;

class TCMenuItemRepository extends TCModel {

  const TC_NEW_MENU_ITEM_NAME = 'New item';

  /**
   * @param $menuId
   * @param array $params
   *
   * @return mixed
   */
  public function getItems($menuId, $params = []) {
    $sql = $this->tcQueryBuilder
      ->select()
      ->from('tc_menu_item')
      ->where('menu_id', $menuId)
      ->orderBy('position', 'ASC')
      ->sql();
    return $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
  }
}