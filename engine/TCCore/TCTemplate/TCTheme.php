<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 1:26 PM
 */

namespace Engine\TCCore\TCTemplate;


class TCTheme {

  const TC_RULES_NAME_FILE = [
    'header' => 'header-%s',
    'footer' => 'footer-%s',
    'sidebar' => 'sidebar-%s',
  ];

  public $tcUrl = '';

  protected $tcData = [];

  /**
   * @param null $tcName
   */
  public function header($tcName = NULL) {
    $tcName = (string) $tcName;
    $tcFile = 'header';
    //
    if ($tcName !== '') {
      $tcFile = sprintf(self::TC_RULES_NAME_FILE['header'], $tcName);
    }
    $this->tcLoadTemplateFile($tcFile);
  }

  /**
   * @param string $tcName
   */
  public function footer($tcName = '') {
    $tcName = (string) $tcName;
    $tcFile = 'footer';
    //
    if ($tcName !== '') {
      $tcFile = sprintf(self::TC_RULES_NAME_FILE['footer'], $tcName);
    }
    $this->tcLoadTemplateFile($tcFile);
  }

  /**
   * @param string $tcName
   */
  public function sidebar($tcName = '') {
    $tcName = (string) $tcName;
    $tcFile = 'sidebar';
    //
    if ($tcName !== '') {
      $tcFile = sprintf(self::TC_RULES_NAME_FILE['sidebar'], $tcName);
    }
    $this->tcLoadTemplateFile($tcFile);
  }

  /**
   * @param string $tcName
   * @param array $tcData
   */
  public function block($tcName = '', $tcData = []) {
    $tcName = (string) $tcName;
    //
    if ($tcName !== '') {
      $this->tcLoadTemplateFile($tcName, $tcData);
    }
  }

  /**
   * @param $tcFileName
   * @param array $tcData
   *
   * @throws \Exception
   */
  private function tcLoadTemplateFile($tcFileName, $tcData = []) {
    $tcTemplateFile = TC_DIR . '/content/themes/default/' . $tcFileName . '.php';
    //
    if (is_file($tcTemplateFile)) {
      extract($tcData);
      require_once $tcTemplateFile;
    }
    else {
      throw new \Exception(
        sprintf('View file %s does not exist!', $tcTemplateFile)
      );
    }
  }

  /**
   * @return array
   */
  public function getTcData() {
    return $this->tcData;
  }

  /**
   * @param array $tcData
   */
  public function setTcData($tcData) {
    $this->tcData = $tcData;
  }
}