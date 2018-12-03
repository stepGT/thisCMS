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
    //
    if ($this->tcAuth->hashUser() !== NULL) {
      header('Location: /admin/');
      exit;
    }
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
    $query = $this->tcDB->tcQuery('
      SELECT *
      FROM `tc_user`
      WHERE `email` = "' . $params['email'] . '"
      AND `password` = "' . md5($params['password']) . '"
      LIMIT 1
    ');
    //
    if (!empty($query)) {
      $user = $query[0];
      //
      if ($user['role'] == 'admin') {
        $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->tcAuth->salt());
        $this->tcDB->tcExecute('
          UPDATE `tc_user`
          SET `hash` = "' . $hash . '"
          WHERE `id` = ' . $user['id'] . '');
        $this->tcAuth->authorize($hash);
        header('Location: /admin/login/');
        exit;
      }
    }
  }
}