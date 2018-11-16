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
    $this->tcView->tcRender('dashboard');
  }
}