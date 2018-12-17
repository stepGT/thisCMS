<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:21 PM
 */

namespace Admin\TCController;

class TCDashboardController extends TCAdminController {

  /**
   *
   */
  public function tcIndex() {
    $userModel = $this->tcLoad->tcModel('TCUser');
    $this->tcView->tcRender('dashboard');
  }
}