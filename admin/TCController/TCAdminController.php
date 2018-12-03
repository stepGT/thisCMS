<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/28/2018
 * Time: 1:58 AM
 */

namespace Admin\TCController;

use Engine\TCController;
use Engine\TCCore\TCAuth\TCAuth;

class TCAdminController extends TCController {

  protected $tcAuth;

  /**
   * TCAdminController constructor.
   *
   * @param $tcDi
   */
  public function __construct($tcDi) {
    parent::__construct($tcDi);
    $this->tcAuth = new TCAuth();
    //
    if ($this->tcAuth->hashUser() == NULL) {
      header('Location: /admin/login/');
      exit;
    }
    else {
      $this->tcCheckAuthorization();
    }
  }

  /**
   * Check Auth
   */
  public function tcCheckAuthorization() {

  }

  public function TCLogout() {
    $this->tcAuth->unAuthorize();
    header('Location: /admin/login/');
    exit;
  }
}