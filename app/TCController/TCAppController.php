<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/28/2018
 * Time: 1:58 AM
 */

namespace App\TCController;

use Engine\TCController;

class TCAppController extends TCController {
  /**
   * TCAppController constructor.
   *
   * @param $tcDi
   */
  public function __construct($tcDi) {
    parent::__construct($tcDi);
  }


}