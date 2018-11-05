<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/28/2018
 * Time: 1:52 AM
 */

namespace Admin\TCController;

class TCErrorController extends TCAdminController {

  /**
   *
   */
  public function tcPage404() {
    print '<pre>';
    print_r('404 page');
    print '</pre>';
  }
}