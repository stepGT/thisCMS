<?php

namespace Engine;

class TCLoad {

  const TC_MASK_MODEL_ENTITY = '\%s\TCModel\%s\%s';

  const TC_MASK_MODEL_REPOSITORY = '\%s\TCModel\%s\%sRepository';

  /**
   * @param $modelName
   * @param bool $modelDir
   *
   * @return \stdClass
   */
  public function tcModel($modelName, $modelDir = FALSE) {
    global $tcDi;
    $modelName = ucfirst($modelName);
    $model     = new \stdClass();
    $modelDir  = $modelDir ? $modelDir : $modelName;
    //
    $nameSpaceEntity = sprintf(
      self::TC_MASK_MODEL_ENTITY,
      ENV, $modelDir, $modelName
    );
    //
    $nameSpaceRepository = sprintf(
      self::TC_MASK_MODEL_REPOSITORY,
      ENV, $modelDir, $modelName
    );
    $model->entity     = $nameSpaceEntity;
    $model->repository = new $nameSpaceRepository($tcDi);
    return $model;
  }
}