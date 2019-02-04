<?php

namespace Engine;

use Engine\TCDI\TCDI;

class TCLoad {

  const TC_MASK_MODEL_ENTITY = '\%s\TCModel\%s\%s';

  const TC_MASK_MODEL_REPOSITORY = '\%s\TCModel\%s\%sRepository';

  const TC_FILE_MASK_LANGUAGE = 'TCLanguage/%s/%s.ini';

  public $tcDi;

  /**
   * TCLoad constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi = $tcDi;
    return $this;
  }


  /**
   * @param $modelName
   * @param bool $modelDir
   * @param bool $env
   *
   * @return bool
   */
  public function tcModel($modelName, $modelDir = FALSE, $env = false) {
    $modelName = ucfirst($modelName);
    $modelDir  = $modelDir ? $modelDir : $modelName;
    $env       = $env ? $env : ENV;
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

  /**
   * @param $path
   *
   * @return array|bool
   */
  public function TCLanguage($path) {
    $file = sprintf(
      self::TC_FILE_MASK_LANGUAGE,
      'english', $path
    );
    $content = parse_ini_file($file);
    // Set to TCDI
    $languageName = $this->toCamelCase($path);
    $language = $this->tcDi->tcGet('tcLanguage') ?: new \stdClass();
    $language->{$languageName} = $content;
    $this->tcDi->tcSet('tcLanguage', $language);
    return $content;
  }

  /**
   * @param $str
   *
   * @return string
   */
  private function toCamelCase($str) {
    $replace = preg_replace('/[^a-zA-Z0-9]/', ' ', $str);
    $convert = mb_convert_case($replace, MB_CASE_TITLE);
    $result = lcfirst(str_replace(' ', '', $convert));
    return $result;
  }
}