<?php


namespace App\TCModel\TCMenu;

use Engine\TCModel;

class TCMenuRepository extends TCModel {

  public function getAllItems() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_menu')
      ->orderBy('id', 'ASC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }
}