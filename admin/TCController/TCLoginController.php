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
use Engine\TCCore\TCDatabase\TCQueryBuilder;

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
    $queryBuilder = new TCQueryBuilder();
    $sql = $queryBuilder
      ->select()
      ->from('tc_user')
      ->where('email', $params['email'])
      ->where('password', md5($params['password']))
      ->limit(1)
      ->sql();
    $query = $this->tcDB->tcQuery($sql, $queryBuilder->values);
    //
    if (!empty($query)) {
      $user = $query[0];
      //
      if ($user['role'] == 'admin') {
        $hash = md5($user['id'] . $user['email'] . $user['password'] . $this->tcAuth->salt());

        // NOT WORK UPDATE hash FIELD!!!
        /*$sql = $queryBuilder
          ->update('tc_user')
          ->set(['hash' => $hash])
          ->where('id', $user['id'])
          ->sql();*/

        $this->tcDB->tcExecute('
          UPDATE `tc_user`
          SET `hash` = "' . $hash . '"
          WHERE `id` = ' . $user['id'] . '
        ');

        //$this->tcDB->tcExecute($sql, $queryBuilder->values);
        $this->tcAuth->authorize($hash);
        header('Location: /admin/login/');
        exit;
      }
    }
    echo 'Incorrect email or password';
  }
}