<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 1:02 AM
 */

namespace Engine\TCCore\TCDatabase;

use PDO;

/**
 * Class TCConnection
 *
 * @package Engine\TCCore\TCDatabase
 */
class TCConnection {

  private $tcLink;

  /**
   * TCConnection constructor.
   */
  public function __construct() {
    $this->tcConnect();
  }

  /**
   * @return $this
   */
  public function tcConnect() {
    $config = [
      'host'    => 'localhost',
      'uname'   => 'root',
      'passwd'  => '',
      'dbname'  => 'thiscms',
      'charset' => 'utf8',
    ];
    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
    $this->tcLink = new PDO($dsn, $config['uname'], $config['passwd']);
    return $this;
  }

  /**
   * @param $tcSql
   *
   * @return mixed
   */
  public function tcExecute($tcSql) {
    $sth = $this->tcLink->prepare($tcSql);
    return $sth->execute();
  }

  /**
   * @param $tcSql
   *
   * @return array
   */
  public function tcQuery($tcSql) {
    $sth = $this->tcLink->prepare($tcSql);
    $sth->execute();
    $result = $sth->fetcAll(PDO::FETCH_ASSOC);
    //
    if ($result === FALSE) {
      return [];
    }
    return $result;
  }
}