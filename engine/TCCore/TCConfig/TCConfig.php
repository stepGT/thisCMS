<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 11/5/2018
 * Time: 9:31 PM
 */

namespace Engine\TCCore\TCConfig;


class TCConfig {

  /**
   * @param $key
   * @param string $group
   *
   * @return null
   */
  public static function item($key, $group = 'TCMain') {
    $groupItems = static::file($group);
    return isset($groupItems[$key]) ? $groupItems[$key] : NULL;
  }

  /**
   * @param $group
   *
   * @return bool|mixed
   * @throws \Exception
   */
  public static function file($group) {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/TCConfig/' . $group . '.php';
    //
    if (file_exists($path)) {
      $items = require_once $path;
      //
      if (!empty($items)) {
        return $items;
      }
      else {
        throw new \Exception(
          sprintf('Config file <strong>%s</strong> is not a valid array', $path)
        );
      }
    }
    else {
      throw new \Exception(
        sprintf('Cannot load config from file, file <strong>%s</strong> does not exist', $path)
      );
    }
  }
}