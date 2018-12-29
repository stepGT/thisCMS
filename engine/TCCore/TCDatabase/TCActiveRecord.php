<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/17/2018
 * Time: 10:31 PM
 */

namespace Engine\TCCore\TCDatabase;

use \ReflectionClass;
use \ReflectionProperty;

trait TCActiveRecord {

  /**
   * @var $db
   */
  protected $db;

  /**
   * @var $queryBuilder
   */
  protected $queryBuilder;

  /**
   * TCActiveRecord constructor.
   *
   * @param int $id
   */
  public function __construct($id = 0) {
    global $tcDi;
    $this->db = $tcDi->tcGet('tcDB');
    $this->queryBuilder = new TCQueryBuilder();
    //
    if ($id) {
      $this->setId($id);
    }
  }

  /**
   * @return mixed
   */
  public function getTable() {
    return $this->table;
  }

  /**
   *
   */
  public function save() {
    $properties = $this->getIssetProperties();
    try {
      //
      if (isset($this->id)) {
        $this->db->tcExecute(
          $this->queryBuilder->update($this->getTable())
            ->set($properties)
            ->where('id', $this->id)
            ->sql(),
          $this->queryBuilder->values
        );
      }
      else {
        $this->db->tcExecute(
          $this->queryBuilder->insert($this->getTable())
            ->set($properties)
            ->sql(),
          $this->queryBuilder->values
        );
      }
      return $this->db->lastInsertId();
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  }

  /**
   * @return array
   */
  private function getIssetProperties() {
    $properties = [];
    //
    foreach ($this->getProperties() as $key => $property) {
      //
      if (isset($this->{$property->getName()})) {
        $properties[$property->getName()] = $this->{$property->getName()};
      }
    }
    return $properties;
  }

  /**
   * @return \ReflectionProperty[]
   */
  private function getProperties() {
    $reflection = new ReflectionClass($this);
    $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);
    return $properties;
  }
}