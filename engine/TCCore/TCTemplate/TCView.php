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
  public function tcRender($template, $vars = []) {
    include_once TCTheme::TCThemeGetThemePath() . '/functions.php';
    $templatePath = $this->tcGetTemplatePath($template, ENV);
    //
    if (!is_file($templatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $template, $templatePath)
      );
    }
    $vars['lang'] = $this->tcDi->tcGet('tcLanguage');
    $this->tcTheme->TCThemeSetData($vars);
    extract($vars);
    // Buffer
    ob_start();
    // Turn off implicit flush
    ob_implicit_flush(0);
    //
    try {
      require $templatePath;
    } catch (\Exception $e) {
      ob_end_clean();
      throw $e;
    }
    // Output
    echo ob_get_clean();
  }

  /**
   * @param $template
   * @param null $env
   *
   * @return string
   */
  private function tcGetTemplatePath($template, $env = NULL) {
    //
    if ($env == 'App') {
      return TC_DIR . '/content/themes/default/' . $template . '.php';
    }
    return TCFunctionPath('view') . '/' . $template . '.php';
  }
}