<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/27/2018
 * Time: 11:37 PM
 */

namespace App\TCController;

use Engine\TCController;


class TCHomeController extends TCController {

  /**
   * TCHomeController constructor.
   *
   * @param $tcDi
   */
  public function __construct($tcDi) {
    parent::__construct($tcDi);
  }

  /**
   *
   */
  public function tcIndex() {
    print '<pre>';
    print_r('Index page');
    print '</pre>';
  }

}