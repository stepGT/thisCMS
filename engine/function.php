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

/**
 * @return array
 */
function TCFunctionGetThemes() {
  $themesPath = '../content/themes';
  $list       = scandir($themesPath);
  $baseUrl    = \Engine\TCCore\TCConfig\TCConfig::item('baseUrl');
  $themes     = [];
  //
  if (!empty($list)) {
    unset($list[0]);
    unset($list[1]);
    //
    foreach ($list as $dir) {
      $pathThemegDir = $themesPath . DIRECTORY_SEPARATOR . $dir;
      $pathConfig    = $pathThemegDir . '/theme.json';
      $pathScreen    = $baseUrl . '/content/themes/' . $dir . '/screen.jpg';
      //
      if (is_dir($pathThemegDir) AND is_file($pathConfig)) {
        $config = file_get_contents($pathConfig);
        $info   = json_decode($config);
        //
        $info->screen = $pathScreen;
        $info->dirTheme = $dir;
        //
        $themes[] = $info;
      }
    }
  }
  return $themes;
}

/**
 * @param string $section
 *
 * @return string
 */
function TCFunctionPathContent($section = '') {
  $pathMask = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content' . DIRECTORY_SEPARATOR . '%s';
  // Return path to correct section.
  switch (strtolower($section)) {
    case 'themes':
      return sprintf($pathMask, 'themes');
    case 'plugins':
      return sprintf($pathMask, 'plugins');
    case 'uploads':
      return sprintf($pathMask, 'uploads');
    default:
      return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'content';
  }
}

/**
 * @return array
 */
function TCFunctionGetPlugins() {
  global $tcDi;
  $pluginsPath = TCFunctionPathContent('plugins');
  $list = scandir($pluginsPath);
  $plugins = [];
  //
  if (!empty($list)) {
    unset($list[0]);
    unset($list[1]);
    //
    foreach ($list as $namePlugin) {
      $namespace = '\\Plugin\\' . $namePlugin . '\\Plugin';
      //
      if (class_exists($namespace)) {
        $plugin = new $namespace($tcDi);
        $plugins[$namePlugin] = $plugin->details();
      }
    }
  }
  return $plugins;
}