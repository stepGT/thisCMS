<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/24/2018
 * Time: 10:33 PM
 */

namespace Engine\TCHelper;


class TCCommon {

  /**
   * @return bool
   */
  public function tcIsPost() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * @return mixed
   */
  public static function tcGetMethod() {
    return $_SERVER['REQUEST_METHOD'];
  }

  /**
   * @return bool|string
   */
  public static function tcGetPathUrl() {
    $tcPathUrl = $_SERVER['REQUEST_URI'];
    //
    if ($tcPosition = strpos($tcPathUrl, '?')) {
      $tcPathUrl = substr($tcPathUrl, 0, $tcPosition);
    }
    return $tcPathUrl;
  }
}