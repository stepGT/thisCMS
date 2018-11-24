<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/24/2018
 * Time: 8:15 PM
 */

namespace Engine\TCCore\TCAuth;

use Engine\TCCore\TCAuthInterface\TCAuthInterface;
use Engine\TCHelper\TCCookie;

class TCAuth implements TCAuthInterface {

  protected $authorized = FALSE;

  protected $user;

  /**
   * @return bool
   */
  public function authorized() {
    return $this->authorized;
  }

  /**
   * @return mixed
   */
  public function user() {
    return $this->user;
  }

  /**
   * @param $user
   */
  public function authorize($user) {
    TCCookie::set('auth.authorized', TRUE);
    TCCookie::set('auth.user', $user);

    $this->authorized = TRUE;
    $this->user = $user;
  }

  /**
   *
   */
  public function unAuthorize() {
    TCCookie::delete('auth.authorized');
    TCCookie::delete('auth.user');

    $this->authorized = FALSE;
    $this->user = NULL;
  }

  /**
   * @return string
   */
  public static function salt() {
    return (string) rand(10000000, 99999999);
  }

  /**
   * @param $password
   * @param string $salt
   *
   * @return string
   */
  public static function encryptPassword($password, $salt = '') {
    return hash('sha256', $password . $salt);
  }
}