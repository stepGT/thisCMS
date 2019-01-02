<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/8/2018
 * Time: 6:59 PM
 */

namespace Admin\TCModel\TCPage;

use Engine\TCModel;

class TCPageRepository extends TCModel {

  /**
   * @return mixed
   */
  public function tcGetPages() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_page')
      ->orderBy('id', 'DESC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }

  /**
   * @param $id
   *
   * @return mixed
   */
  public function getPageData($id) {
    $page = new TCPage($id);
    return $page->findOne();
  }

  /**
   * @param $params
   */
  public function createPage($params) {
    $page = new TCPage();
    $page->setTitle($params['title']);
    $page->setContent($params['content']);
    $pageId = $page->save();
    return $pageId;
  }

  /**
   * @param $params
   *
   * @return mixed
   */
  public function updatePage($params) {
    //
    if (isset($params['page_id'])) {
      $page = new TCPage($params['page_id']);
      $page->setTitle($params['title']);
      $page->setContent($params['content']);
      $page->save();
    }
  }
}