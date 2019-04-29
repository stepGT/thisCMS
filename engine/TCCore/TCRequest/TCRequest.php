<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/25/2018
 * Time: 8:07 PM
 */

namespace Engine\TCCore\TCRequest;


class TCRequest {

  /**
   * @var array
   */
  public $tcGet = [];

  /**
   * @var array
   */
  public $tcPost = [];

  /**
   * @var array
   */
  public $tcRequest = [];

  /**
   * @var array
   */
  public $tcCookie = [];

  /**
   * @var array
   */
  public $tcFiles = [];

  /**
   * @var array
   */
  public $tcServer = [];

  /**
   * TCRequest constructor.
   */
  public function __construct() {
    $this->tcGet     = $_GET;
    $this->tcPost    = $_POST;
    $this->tcRequest = $_REQUEST;
    $this->tcCookie  = $_COOKIE;
    $this->tcFiles   = $_FILES;
    $this->tcServer  = $_SERVER;
  }

  /**
   * @param bool $key
   *
   * @return array|mixed
   */
  public function TCRequestGet($key = FALSE) {
    return $key ? $this->tcGet[$key] : $this->tcGet;
  }

  /**
   * @param bool $key
   *
   * @return array|mixed
   */
  public function TCRequestPost($key = FALSE) {
    return $key ? $this->tcPost[$key] : $this->tcPost;
  }
}