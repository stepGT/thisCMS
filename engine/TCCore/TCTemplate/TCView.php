<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/29/2018
 * Time: 9:30 PM
 */

namespace Engine\TCCore\TCTemplate;


class TCView {

  /**
   * TCView constructor.
   */
  public function __construct() {
  }

  /**
   * @param $tcTemplate
   * @param array $tcVars
   *
   * @throws \Exception
   */
  public function tcRender($tcTemplate, $tcVars = []) {
    $tcTemplatePath = TC_DIR . '/content/themes/default/' . $tcTemplate . '.php';
    if (!is_file($tcTemplatePath)) {
      throw new \InvalidArgumentException(
        sprintf('Template "%s" not found in "%s"', $tcTemplate, $tcTemplatePath)
      );
    }
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
}