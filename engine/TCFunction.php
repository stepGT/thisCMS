<?php

/**
 * @param $section
 *
 * @return string
 */
function TCFunctionPath($section) {
  $pathMask = TC_DIR . DIRECTORY_SEPARATOR . '%s';
  //
  if (ENV == 'App') {
    $pathMask = TC_DIR . DIRECTORY_SEPARATOR . strtolower(ENV) . DIRECTORY_SEPARATOR . '%s';
  }
  // Return path to correct section
  switch (strtolower($section)) {
    case 'controller':
      return sprintf($pathMask, 'TCController');
      break;
    case 'config':
      return sprintf($pathMask, 'TCConfig');
      break;
    case 'model':
      return sprintf($pathMask, 'TCModel');
      break;
    case 'view':
      return sprintf($pathMask, 'TCView');
      break;
    case 'language':
      return sprintf($pathMask, 'TCLanguage');
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