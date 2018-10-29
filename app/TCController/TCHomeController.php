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
    $tcData = ['name' => 'Andrey'];
    $this->tcView->tcRender('index', $tcData);
  }
}