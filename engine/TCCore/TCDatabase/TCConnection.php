<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 1:02 AM
 */

namespace Engine\TCCore\TCDatabase;

use PDO;
use Engine\TCCore\TCConfig\TCConfig;

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
    $config = TCConfig::group('TCDatabase');
    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
    $this->tcLink = new PDO($dsn, $config['username'], $config['password']);
    return $this;
  }

  /**
   * @param $tcSql
   * @param array $values
   *
   * @return mixed
   */
  public function tcExecute($tcSql, $values = []) {
    $sth = $this->tcLink->prepare($tcSql);
    return $sth->execute($values);
  }

  /**
   * @param $tcSql
   * @param array $values
   *
   * @return array
   */
  public function tcQuery($tcSql, $values = [], $statement = PDO::FETCH_OBJ) {
    $sth = $this->tcLink->prepare($tcSql);
    $sth->execute($values);
    $result = $sth->fetchAll($statement);
    //
    if ($result === FALSE) {
      return [];
    }
    return $result;
  }

  /**
   * @return mixed
   */
  public function lastInsertId() {
    return $this->tcLink->lastInsertId();
  }
}