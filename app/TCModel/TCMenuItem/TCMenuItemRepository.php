<?php


namespace App\TCModel\TCMenuItem;

use Engine\TCModel;

class TCMenuItemRepository extends TCModel {

  const TC_NEW_MENU_ITEM_NAME = 'New item';
  const TC_FIELD_NAME = 'name';
  const TC_FIELD_LINK = 'link';

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

  /**
   * @param array $params
   *
   * @return int
   */
  public function TCMenuItemRepositoryUpdate($params = []) {
    if (empty($params)) {
      return 0;
    }
    //
    $menuItem = new TCMenuItem($params['item_id']);
    //
    if ($params['field'] == self::TC_FIELD_NAME) {
      $menuItem->setName($params['value']);
    }
    if ($params['field'] == self::TC_FIELD_LINK) {
      $menuItem->setLink($params['value']);
    }
    return $menuItem->save();
  }

  /**
   * @param $itemId
   *
   * @return mixed
   */
  public function TCMenuItemRepositoryRemove($itemId) {
    $sql = $this->tcQueryBuilder
      ->delete()
      ->from('tc_menu_item')
      ->where('id', $itemId)
      ->sql();
    return $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
  }
}