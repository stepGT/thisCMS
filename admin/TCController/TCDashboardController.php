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
    //$userModel = $this->tcLoad->tcModel('TCUser');
    //$userModel->repository->test();
    /*print '<pre>';
    print_r($userModel->repository->tcGetUsers());
    print '</pre>';*/
    $this->tcView->tcRender('dashboard');
  }
}