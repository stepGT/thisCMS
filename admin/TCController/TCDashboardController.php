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
    // Load models
    $this->tcLoad->tcModel('TCUser');
    // Load language
    $this->tcLoad->TCLanguage('dashboard/main');
    $this->tcView->tcRender('dashboard');
  }
}