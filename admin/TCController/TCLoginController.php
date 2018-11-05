<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:20 PM
 */

namespace Admin\TCController;


class TCLoginController extends TCAdminController {

  /**
   *
   */
  public function tcForm() {
    $this->tcView->tcRender('login');
  }
}