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
   * @param string $segment
   *
   * @return object|bool
   */
  public function getPageBySegment($segment) {
    $sql = $this->tcQueryBuilder
      ->select()
      ->from('tc_page')
      ->where('segment', $segment)
      ->limit(1)
      ->sql();
    $result = $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
    return isset($result[0]) ? $result[0] : FALSE;
  }

  /**
   * @param $params
   */
  public function createPage($params) {
    $page = new TCPage();
    $page->setTitle($params['title']);
    $page->setContent($params['content']);
    $page->setSegment(\Engine\TCHelper\TCText::transliteration($params['title']));
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
      $page->setStatus($params['status']);
      $page->setType($params['type']);
      $page->save();
    }
  }
}