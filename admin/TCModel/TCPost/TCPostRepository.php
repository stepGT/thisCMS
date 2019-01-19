<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/8/2018
 * Time: 6:59 PM
 */

namespace Admin\TCModel\TCPost;

use Engine\TCModel;

class TCPostRepository extends TCModel {

  /**
   * @return mixed
   */
  public function tcGetPosts() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_post')
      ->orderBy('id', 'DESC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }

  /**
   * @param $id
   *
   * @return mixed
   */
  public function getPostData($id) {
    $post = new TCPost($id);
    return $post->findOne();
  }

  /**
   * @param $params
   */
  public function createPost($params) {
    $post = new TCPost();
    $post->setTitle($params['title']);
    $post->setContent($params['content']);
    $postId = $post->save();
    return $postId;
  }

  /**
   * @param $params
   *
   * @return mixed
   */
  public function updatePost($params) {
    //
    if (isset($params['post_id'])) {
      $post = new TCPost($params['post_id']);
      $post->setTitle($params['title']);
      $post->setContent($params['content']);
      $post->save();
    }
  }
}