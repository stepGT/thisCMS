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

  public $container = [];

  /**
   * @param $link
   */
  public function css($link) {
    $file = $link . self::TC_EXT_CSS;
    //
    if(is_file($file)) {
      $this->container['css'][] = [
        'file' => $file
      ];
    }
  }

  /**
   * @param $link
   */
  public function js($link) {
    $file = $link . self::TC_EXT_JS;
    //
    if (is_file($file)) {
      $this->container['js'][] = [
        'file' => $file,
      ];
    }
  }

  /**
   * @param $extension
   */
  public function render($extension) {
    $listAssets = isset($this->container[$extension]) ? $this->container[$extension] : FALSE;
    if($listAssets) {
      $renderMethod = 'render' . ucfirst($extension);
      $this->{$renderMethod}($listAssets);
    }
  }

  /**
   * @param $list
   */
  public function renderJS ($list) {
    foreach ($list as $item) {
      echo sprintf(self::TC_JS_SCRIPT_MASK, $item['file']);
    }
  }

  /**
   * @param $list
   */
  public function renderCSS ($list) {
    foreach ($list as $item) {
      echo sprintf(self::TC_CSS_LINK_MASK, $item['file']);
    }
  }
}