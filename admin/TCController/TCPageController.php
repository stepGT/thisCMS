<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:19 PM
 */

namespace Admin\TCController;


class TCPageController extends TCAdminController {

  /**
   *
   */
  public function listing() {
    $this->tcLoad->tcModel('TCPage');
    $data['pages'] = $this->tcModel->TCPage->tcGetPages();
    $this->tcView->tcRender('TCPages/list', $data);
  }

  /**
   *
   */
  public function create() {
    $this->tcView->tcRender('TCPages/create');
  }

  /**
   * @param $id
   */
  public function edit($id) {
    $this->tcLoad->tcModel('TCPage');
    $this->data['page'] = $this->tcModel->TCPage->getPageData($id);
    $this->tcView->tcRender('TCPages/edit', $this->data);
  }

  /**
   *
   */
  public function update() {
    $this->tcLoad->tcModel('TCPage');
    $params = $this->tcRequest->tcPost;
    //
    if (!empty($params['title'])) {
      echo $this->tcModel->TCPage->updatePage($params);
    }
  }

  /**
   *
   */
  public function add() {
    $this->tcLoad->tcModel('TCPage');
    $params = $this->tcRequest->tcPost;

    //
    if (!empty($params['title'])) {
      echo $this->tcModel->TCPage->createPage($params);
    }
  }
}