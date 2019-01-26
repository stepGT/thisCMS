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
   * Retrieves a config item.
   *
   * @param  string $key
   * @param  string $group
   *
   * @return mixed
   */
  public static function item($key, $group = 'TCMain') {
    if (!TCRepository::retrieve($group, $key)) {
      self::file($group);
    }

    return TCRepository::retrieve($group, $key);
  }

  /**
   * Retrieves a group config items.
   *
   * @param  string $group The item group.
   *
   * @return mixed
   */
  public static function group($group) {
    if (!TCRepository::retrieveGroup($group)) {
      self::file($group);
    }

    return TCRepository::retrieveGroup($group);
  }

  /**
   * @param string $group
   *
   * @return bool
   * @throws \Exception
   */
  public static function file($group = 'TCMain') {
    $path = TCFunctionPath('config') . DIRECTORY_SEPARATOR . $group . '.php';

    // Check that the file exists before we attempt to load it.
    if (file_exists($path)) {
      // Get items from the file.
      $items = include $path;

      // Items must be an array.
      if (is_array($items)) {
        // Store items.
        foreach ($items as $key => $value) {
          TCRepository::store($group, $key, $value);
        }

        // Successful file load.
        return TRUE;
      }
      else {
        throw new \Exception(
          sprintf(
            'Config file <strong>%s</strong> is not a valid array.',
            $path
          )
        );
      }
    }
    else {
      throw new \Exception(
        sprintf(
          'Cannot load config from file, file <strong>%s</strong> does not exist.',
          $path
        )
      );
    }
    // File load unsuccessful.
    return FALSE;
  }
}