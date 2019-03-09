<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:19 PM
 */

namespace Admin\TCController;

use Engine\TCCore\TCTemplate\TCTheme;

class TCSettingController extends TCAdminController {

  /**
   *
   */
  public function general() {
    $this->tcLoad->tcModel('TCSetting');
    $this->data['settings']  = $this->tcModel->TCSetting->getSettings();
    $this->data['languages'] = TCFunctionLanguages();
    $this->tcView->tcRender('TCSetting/general', $this->data);
  }

  /**
   *
   */
  public function menus() {
    $this->tcLoad->tcModel('TCMenu', FALSE, 'App');
    $this->tcLoad->tcModel('TCMenuItem', FALSE, 'App');
    //
    $this->data['menuId']   = $this->tcRequest->tcGet['menu_id'];
    $this->data['menus']    = $this->tcModel->TCMenu->getList();
    $this->data['editMenu'] = $this->tcModel->TCMenuItem->getItems($this->data['menuId']);
    //
    $this->tcView->tcRender('TCSetting/menus', $this->data);
  }

  /**
   *
   */
  public function ajaxMenuAdd() {
    $params = $this->tcRequest->tcPost;
    $this->tcLoad->tcModel('TCMenu', FALSE, 'App');
    //
    if (isset($params['name']) && strlen($params['name']) > 0) {
      $addMenu = $this->tcModel->TCMenu->add($params);
      echo $addMenu;
    }
  }

  /**
   *
   */
  public function ajaxMenuAddItem() {
    $params = $this->tcRequest->tcPost;
    $this->tcLoad->tcModel('TCMenuItem', FALSE, 'App');
    //
    if (isset($params['menu_id']) && strlen($params['menu_id']) > 0) {
      $id = $this->tcModel->TCMenuItem->add($params);
      $item = new \stdClass;
      $item->id   = $id;
      $item->name = \App\TCModel\TCMenuItem\TCMenuItemRepository::TC_NEW_MENU_ITEM_NAME;
      $item->link = '#';
      //
      TCTheme::block('TCSetting/menu_item', [
        'item' => $item,
      ]);
    }
  }

  /**
   *
   */
  public function ajaxMenuSortItems() {
    $params = $this->tcRequest->tcPost;
    $this->tcLoad->tcModel('TCMenuItem', FALSE, 'App');
    if (isset($params['data']) && !empty($params['data'])) {
      $sortItem = $this->tcModel->TCMenuItem->TCMenuItemRepositorySort($params);
    }
  }

  /**
   *
   */
  public function ajaxMenuRemoveItem() {
    $params = $this->tcRequest->tcPost;
    $this->tcLoad->tcModel('TCMenuItem', FALSE, 'App');
    if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
      $removeItem = $this->tcModel->TCMenuItem->TCMenuItemRepositoryRemove($params['item_id']);
      echo $removeItem;
    }
  }

  /**
   *
   */
  public function ajaxMenuUpdateItem() {
    $params = $this->tcRequest->tcPost;
    $this->tcLoad->tcModel('TCMenuItem', FALSE, 'App');
    if (isset($params['item_id']) && strlen($params['item_id']) > 0) {
      $this->tcModel->TCMenuItem->TCMenuItemRepositoryUpdate($params);
    }
  }

  /**
   * @return mixed
   */
  public function TCSettingControllerUpdateSetting() {
    $this->tcLoad->tcModel('TCSetting');
    $params = $this->tcRequest->tcPost;
    $update = $this->tcModel->TCSetting->update($params);
    return $update;
  }
}