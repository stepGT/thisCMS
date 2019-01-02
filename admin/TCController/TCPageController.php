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
    $pageModel = $this->tcLoad->tcModel('TCPage');
    $data['pages'] = $pageModel->repository->tcGetPages();
    $this->tcView->tcRender('TCPages/list', $data);
  }

  /**
   *
   */
  public function create() {
    $pageModel = $this->tcLoad->tcModel('TCPage');
    $this->tcView->tcRender('TCPages/create');
  }

  /**
   * @param $id
   */
  public function edit($id) {
    $pageModel = $this->tcLoad->tcModel('TCPage');
    $this->data['page'] = $pageModel->repository->getPageData($id);
    $this->tcView->tcRender('TCPages/edit', $this->data);
  }

  /**
   *
   */
  public function update() {
    $params    = $this->tcRequest->tcPost;
    $pageModel = $this->tcLoad->tcModel('TCPage');
    //
    if (!empty($params['title'])) {
      echo $pageModel->repository->updatePage($params);
    }
  }

  /**
   *
   */
  public function add() {
    $params    = $this->tcRequest->tcPost;
    $pageModel = $this->tcLoad->tcModel('TCPage');
    //
    if (!empty($params['title'])) {
      echo $pageModel->repository->createPage($params);
    }
  }
}