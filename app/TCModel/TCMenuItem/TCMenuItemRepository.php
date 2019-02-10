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

  /**
   * @param array $params
   *
   * @return int
   */
  public function add($params = []) {
    //
    if (empty($params)) {
      return 0;
    }
    $menuItem = new TCMenuItem;
    $menuItem->setMenuId($params['menu_id']);
    $menuItem->setName(self::TC_NEW_MENU_ITEM_NAME);
    $menuItemId = $menuItem->save();
    return $menuItemId;
  }

  /**
   * @param array $params
   */
  public function TCMenuItemRepositorySort($params = []) {
    $items = isset($params['data']) ? json_decode($params['data']) : [];
    //
    if (!empty($items) AND isset($items[0])) {
      foreach ($items[0] as $position => $item) {
        $this->tcDB->tcExecute(
          $this->tcQueryBuilder
            ->update('tc_menu_item')
            ->set(['position' => $position])
            ->where('id', $item->id)
            ->sql(),
          $this->tcQueryBuilder->values
        );
      }
    }
  }
}