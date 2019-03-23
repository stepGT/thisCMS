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

  const TC_SECTION_GENERAL = 'general';

  /**
   * @return mixed
   */
  public function getSettings() {
    $sql = $this->tcQueryBuilder->select()
      ->from('tc_setting')
      ->where('section', self::TC_SECTION_GENERAL)
      ->orderBy('id', 'ASC')
      ->sql();
    return $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
  }

  /**
   * @param $keyField
   *
   * @return null
   */
  public function TCSettingRepositoryGetSettingValue($keyField) {
    $sql = $this->tcQueryBuilder->select('value')
      ->from('tc_setting')
      ->where('key_field', $keyField)
      ->sql();
    $query = $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
    return isset($query[0]) ? $query[0]->value : NULL;
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

  public function updateActiveTheme($theme) {
    $sql = $this->tcQueryBuilder
      ->update('tc_setting')
      ->set(['value' => $theme])
      ->where('key_field', 'active_theme')
      ->sql();
    $this->tcDB->tcExecute($sql, $this->tcQueryBuilder->values);
  }
}