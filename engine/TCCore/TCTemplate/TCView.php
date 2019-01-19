<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/29/2018
 * Time: 9:30 PM
 */

namespace Engine\TCCore\TCTemplate;


use Engine\TCDI\TCDI;

class TCView {

  public $tcDi;

  protected $tcTheme;

  /**
   * TCView constructor.
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi = $tcDi;
    $this->tcTheme = new TCTheme();
  }

  /**
   * @param $tcTemplate
   * @param array $tcVars
   *
   * @throws \Exception
   */
  public function tcRender($tcTemplate, $tcVars = []) {
    $tcTemplatePath = $this->tcGetTemplatePath($tcTemplate, ENV);
    //
    if (!is_file($tcTemplatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $tcTemplate, $tcTemplatePath)
      );
    }
    $tcVars['lang'] = $this->tcDi->tcGet('tcLanguage');
    $this->tcTheme->setTcData($tcVars);
    extract($tcVars);
    // Buffer
    ob_start();
    // Turn off implicit flush
    ob_implicit_flush(0);
    //
    try {
      require $tcTemplatePath;
    } catch (\Exception $e) {
      ob_end_clean();
      throw $e;
    }
    // Output
    echo ob_get_clean();
  }

  /**
   * @param $tcTemplate
   * @param null $tcEnv
   *
   * @return string
   */
  private function tcGetTemplatePath($tcTemplate, $tcEnv = NULL) {
    //
    if ($tcEnv == 'App') {
      return TC_DIR . '/content/themes/default/' . $tcTemplate . '.php';
    }
    return TC_DIR . '/TCView/' . $tcTemplate . '.php';
  }
}