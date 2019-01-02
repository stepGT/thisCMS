<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/8/2018
 * Time: 6:59 PM
 */

namespace Admin\TCModel\TCUser;

use Engine\TCModel;

class TCUserRepository extends TCModel {

  /**
   * @return mixed
   */
  public function tcGetUsers() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_user')
      ->orderBy('id', 'DESC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }

  /**
   *
   */
  public function test() {
    $user = new TCPage(1);
    $user->setEmail('admin@admin.org');
    $user->save();
  }
}