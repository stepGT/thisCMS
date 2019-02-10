<?php


namespace App\TCModel\TCMenu;

use Engine\TCModel;

class TCMenuRepository extends TCModel {

  /**
   * @param array $params
   *
   * @return int
   */
  public function add($params = []) {
    if (empty($params)) {
      return 0;
    }
    $menu = new TCMenu;
    $menu->setName($params['name']);
    $menuId = $menu->save();
    return $menuId;
  }

  public function getList() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_menu')
      ->orderBy('id', 'ASC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }
}