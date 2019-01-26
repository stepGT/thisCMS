<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 1/26/2019
 * Time: 6:03 PM
 */

namespace engine\TCCore\TCConfig;


class TCRepository {

  /**
   * @var array Stored config items.
   */
  protected static $stored = [];

  /**
   * Stores a config item.
   *
   * @param  string $group The item group.
   * @param  string $key The item key.
   * @param  mixed $data The item data.
   *
   * @return void
   */
  public static function store($group, $key, $data) {
    // Ensure the group is a valid array.
    if (!isset(static::$stored[$group]) || !is_array(static::$stored[$group])) {
      static::$stored[$group] = [];
    }

    // Store the data.
    static::$stored[$group][$key] = $data;
  }

  /**
   * Retrieves a config item.
   *
   * @param  string $group The item group.
   * @param  string $key The item key.
   *
   * @return mixed
   */
  public static function retrieve($group, $key) {
    return isset(static::$stored[$group][$key]) ? static::$stored[$group][$key] : FALSE;
  }

  /**
   * Retrieves a config item.
   *
   * @param  string $group The item group.
   *
   * @return mixed
   */
  public static function retrieveGroup($group) {
    return isset(static::$stored[$group]) ? static::$stored[$group] : FALSE;
  }
}