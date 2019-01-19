<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:19 PM
 */

namespace Admin\TCController;


class TCPostController extends TCAdminController {

  /**
   *
   */
  public function listing() {
    $this->tcLoad->tcModel('TCPost');
    $data['posts'] = $this->tcModel->TCPost->tcGetPosts();
    $this->tcView->tcRender('TCPosts/list', $data);
  }

  /**
   *
   */
  public function create() {
    $this->tcView->tcRender('TCPosts/create');
  }

  /**
   * @param $id
   */
  public function edit($id) {
    $this->tcLoad->tcModel('TCPost');
    $this->data['post'] = $this->tcModel->TCPost->getPostData($id);
    $this->tcView->tcRender('TCPosts/edit', $this->data);
  }

  /**
   *
   */
  public function update() {
    $this->tcLoad->tcModel('TCPost');
    $params = $this->tcRequest->tcPost;
    //
    if (!empty($params['title'])) {
      echo $this->tcModel->TCPost->updatePost($params);
    }
  }

  /**
   *
   */
  public function add() {
    $this->tcLoad->tcModel('TCPost');
    $params = $this->tcRequest->tcPost;

    //
    if (!empty($params['title'])) {
      echo $this->tcModel->TCPost->createPost($params);
    }
  }
}