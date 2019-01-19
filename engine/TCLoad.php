<?php

namespace Engine;

use Engine\TCDI\TCDI;

class TCLoad {

  const TC_MASK_MODEL_ENTITY = '\%s\TCModel\%s\%s';

  const TC_MASK_MODEL_REPOSITORY = '\%s\TCModel\%s\%sRepository';

  public $tcDi;

  /**
   * TCLoad constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi = $tcDi;
  }

  /**
   * @param $modelName
   * @param bool $modelDir
   *
   * @return bool
   */
  public function tcModel($modelName, $modelDir = FALSE) {
    $modelName = ucfirst($modelName);
    $modelDir  = $modelDir ? $modelDir : $modelName;
    //
    $nameSpaceModel = sprintf(
      self::TC_MASK_MODEL_REPOSITORY,
      ENV, $modelDir, $modelName
    );
    $isClassModel = class_exists($nameSpaceModel);
    //
    if ($isClassModel) {
      $modelRegistry = $this->tcDi->tcGet('tcModel') ?: new \stdClass();
      $modelRegistry->{$modelName} = new $nameSpaceModel($this->tcDi);
      $this->tcDi->tcSet('tcModel', $modelRegistry);
    }
    return $isClassModel;
  }
}