<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 7:20 PM
 */

namespace Admin\TCController;

use Engine\TCController;
use Engine\TCDI\TCDI;
use Engine\TCCore\TCAuth\TCAuth;

class TCLoginController extends TCController {

  protected $tcAuth;

  /**
   * TCLoginController constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    parent::__construct($tcDi);
    $this->tcAuth = new TCAuth();
  }

  /**
   *
   */
  public function tcForm() {
    $this->tcView->tcRender('login');
  }

  /**
   *
   */
  public function tcAuthAdmin() {
    $params = $this->tcRequest->tcPost;
    $this->tcAuth->authorize('qwerty');
  }
}