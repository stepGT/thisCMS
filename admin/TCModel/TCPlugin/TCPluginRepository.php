<?php

namespace Admin\TCModel\TCPlugin;

use Engine\TCModel;

class TCPluginRepository extends TCModel {

  /**
   * @return mixed
   */
  public function TCPluginRepositoryGetPlugins() {
    $sql = $this->tcQueryBuilder
      ->select()
      ->from('tc_plugin')
      ->sql();
    $query = $this->tcDB->tcQuery($sql);
    return $query;
  }

  /**
   * @return mixed
   */
  public function TCPluginRepositoryGetActivePlugins() {
    $sql = $this->tcQueryBuilder
      ->select()
      ->from('tc_plugin')
      ->where('is_active', 1)
      ->sql();
    $query = $this->tcDB->tcQuery($sql, $this->tcQueryBuilder->values);
    return $query;
  }

  /**
   * @param $directory
   *
   * @return mixed
   */
  public function TCPluginRepositoryAddPlugin($directory) {
    $plugin = new TCPlugin();
    $plugin->setDirectory($directory);
    return $plugin->save();
  }

  /**
   * @param $id
   * @param $active
   *
   * @return mixed
   */
  public function TCPluginRepositoryActivatePlugin($id, $active) {
    $plugin = new TCPlugin($id);
    $plugin->setIsActive($active);
    return $plugin->save();
  }

  /**
   * @param $directory
   *
   * @return bool
   */
  public function TCPluginRepositoryIsInstallPlugin($directory) {
    $query = $this->tcDB->tcQuery(
      $this->tcQueryBuilder
        ->select('COUNT(id) as count')
        ->from('tc_plugin')
        ->where('directory', $directory)
        ->limit(1)
        ->sql(),
      $this->tcQueryBuilder->values
    );
    //
    if ($query[0]->count > 0) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * @param $directory
   *
   * @return bool
   */
  public function TCPluginRepositoryIsActivePlugin($directory) {
    $query = $this->tcDB->tcQuery(
      $this->tcQueryBuilder
        ->select('COUNT(`id`) as `count`')
        ->from('tc_plugin')
        ->where('directory', $directory)
        ->where('is_active', 1)
        ->limit(1)
        ->sql(),
      $this->tcQueryBuilder->values
    );
    //
    if ($query[0]->count > 0) {
      return TRUE;
    }
    return FALSE;
  }
}
