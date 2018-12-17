<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/8/2018
 * Time: 6:58 PM
 */

namespace Admin\TCModel\TCUser;


class TCUser {

  /**
   * @var string
   */
  protected $table = 'tc_user';

  /**
   * @var $id
   */
  public $id;

  /**
   * @var $email
   */
  public $email;

  /**
   * @var $password
   */
  public $password;

  /**
   * @var $role
   */
  public $role;

  /**
   * @var $hash
   */
  public $hash;

  /**
   * @var $date_req
   */
  public $date_req;

  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * @param $email
   */
  public function setEmail($email) {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * @param $password
   */
  public function setPassword($password) {
    $this->password = $password;
  }

  /**
   * @return mixed
   */
  public function getRole() {
    return $this->role;
  }

  /**
   * @param $role
   */
  public function setRole($role) {
    $this->role = $role;
  }

  /**
   * @return mixed
   */
  public function getHash() {
    return $this->hash;
  }

  /**
   * @param $hash
   */
  public function setHash($hash) {
    $this->hash = $hash;
  }

  /**
   * @return mixed
   */
  public function getDateReq() {
    return $this->date_req;
  }

  /**
   * @param $date_req
   */
  public function setDateReq($date_req) {
    $this->date_req = $date_req;
  }
}