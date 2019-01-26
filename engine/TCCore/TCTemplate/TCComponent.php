<?php

namespace Engine\TCCore\TCTemplate;

class TCComponent {

  /**
   * @param $name
   * @param array $data
   *
   * @throws \Exception
   */
  public static function TCComponentLoad($name, $data = []) {
    $templateFile = TC_DIR . '/content/themes/default/' . $name . '.php';
    //
    if (ENV == 'Admin') {
      $templateFile = TCFunctionPath('view') . '/' . $name . '.php';
    }
    //
    if (is_file($templateFile)) {
      extract(array_merge($data, TCTheme::TCThemeGetData()));
      require_once $templateFile;
    }
    else {
      throw new \Exception(
        sprintf('View file %s does not exist!', $templateFile)
      );
    }
  }
}