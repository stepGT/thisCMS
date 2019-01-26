<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 1/19/2019
 * Time: 7:59 PM
 */

namespace Admin\TCModel\TCSetting;

use Engine\TCModel;

class TCSettingRepository extends TCModel {

  /**
   * @return mixed
   */
  public function getSettings() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_setting')
      ->orderBy('id', 'ASC')
      ->sql();
    return $this->tcDB->tcQuery($sql);
  }

  public function update(array $params) {
    //
    if (!empty($params)) {
      //
      foreach ($params as $key => $value) {
        $sql = $this->tcQueryBuilder
          ->update('tc_setting')
          ->set(['value' => $value])
          ->where('key_field', $key)
          ->sql();
        $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
      }
    }
  }
}