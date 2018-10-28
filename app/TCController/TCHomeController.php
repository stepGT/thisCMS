<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/27/2018
 * Time: 11:37 PM
 */

namespace App\TCController;

class TCHomeController extends TCAppController {

  /**
   *
   */
  public function tcIndex() {
    print '<pre>';
    print_r('Index page');
    print '</pre>';
  }

  /**
   *
   */
  public function tcNews($tcId) {
    print '<pre>';
    print_r($tcId);
    print '</pre>';
  }

}