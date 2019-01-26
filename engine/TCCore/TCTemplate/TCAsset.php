<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 1/27/2019
 * Time: 1:30 AM
 */

namespace Engine\TCCore\TCTemplate;


class TCAsset {

  const TC_EXT_JS   = '.js';
  const TC_EXT_CSS  = '.css';
  const TC_EXT_LESS = '.less';

  const TC_JS_SCRIPT_MASK = '<script src="%s" type="text/javascript"></script>';
  const TC_CSS_LINK_MASK  = '<link rel="stylesheet" href="%s">';

  public static $container = [];

  /**
   * @param $link
   */
  public static function css($link) {
    $file = TCTheme::TCThemeGetThemePath() . DIRECTORY_SEPARATOR . $link . self::TC_EXT_CSS;
    //
    if(is_file($file)) {
      self::$container['css'][] = [
        'file' => TCTheme::getURL() . '/' . $link . self::TC_EXT_CSS,
      ];
    }
  }

  /**
   * @param $link
   */
  public static function js($link) {
    $file = TCTheme::TCThemeGetThemePath() . DIRECTORY_SEPARATOR . $link . self::TC_EXT_JS;
    //
    if (is_file($file)) {
      self::$container['js'][] = [
        'file' => TCTheme::getURL() . '/' . $link . self::TC_EXT_JS,
      ];
    }
  }

  /**
   * @param $extension
   */
  public static function render($extension) {
    $listAssets = isset(self::$container[$extension]) ? self::$container[$extension] : FALSE;
    if($listAssets) {
      $renderMethod = 'render' . ucfirst($extension);
      self::{$renderMethod}($listAssets);
    }
  }

  /**
   * @param $list
   */
  public static function renderJS ($list) {
    foreach ($list as $item) {
      echo sprintf(self::TC_JS_SCRIPT_MASK, $item['file']);
    }
  }

  /**
   * @param $list
   */
  public static function renderCSS ($list) {
    foreach ($list as $item) {
      echo sprintf(self::TC_CSS_LINK_MASK, $item['file']);
    }
  }
}