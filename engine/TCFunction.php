<?php

/**
 * @param $section
 *
 * @return string
 */
function TCFunctionPath($section) {
  // Return path to correct section
  switch (strtolower($section)) {
    case 'controller':
      return TC_DIR . DIRECTORY_SEPARATOR . 'TCController';
      break;
    case 'config':
      return TC_DIR . DIRECTORY_SEPARATOR . 'TCConfig';
      break;
    case 'model':
      return TC_DIR . DIRECTORY_SEPARATOR . 'TCModel';
      break;
    case 'view':
      return TC_DIR . DIRECTORY_SEPARATOR . 'TCView';
      break;
    case 'language':
      return TC_DIR . DIRECTORY_SEPARATOR . 'TCLanguage';
      break;
    default:
      return TC_DIR;
  }
}

/**
 *
 */
function TCFunctionLanguages() {
  $directory = TCFunctionPath('language');
  $list      = scandir($directory);
  $languages = [];
  //
  if (!empty($list)) {
    unset($list[0]);
    unset($list[1]);
    //
    foreach ($list as $dir) {
      $pathLangDir = $directory . DIRECTORY_SEPARATOR . $dir;
      $pathConfig = $pathLangDir . '/config.json';
      //
      if (is_dir($pathLangDir) AND is_file($pathConfig)) {
        $config = file_get_contents($pathConfig);
        $info = json_decode($config);
        $languages[] = $info;
      }
    }
  }
  return $languages;
}