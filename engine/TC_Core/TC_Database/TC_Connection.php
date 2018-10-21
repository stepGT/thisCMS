<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 1:02 AM
 */

namespace Engine\TC_Core\TC_Database;

use PDO;

/**
 * Class TC_Connection
 *
 * @package Engine\TC_Core\TC_Database
 */
class TC_Connection {

  private $tc_link;

  /**
   * TC_Connection constructor.
   */
  public function __construct() {
    $this->tc_connect();
  }

  /**
   * @return $this
   */
  public function tc_connect() {
    $config = [
      'host'    => 'localhost',
      'uname'   => 'root',
      'passwd'  => '',
      'dbname'  => 'thiscms',
      'charset' => 'utf8',
    ];
    $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
    $this->tc_link = new PDO($dsn, $config['uname'], $config['passwd']);
    return $this;
  }

  /**
   * @param $sql
   *
   * @return mixed
   */
  public function tc_execute($sql) {
    $sth = $this->tc_link->prepare($sql);
    return $sth->execute();
  }

  /**
   * @param $sql
   *
   * @return array
   */
  public function tc_query($sql) {
    $sth = $this->tc_link->prepare($sql);
    $sth->execute();
    $result = $sth->fetcAll(PDO::FETCH_ASSOC);
    //
    if ($result === FALSE) {
      return [];
    }
    return $result;
  }
}