<?php

namespace Plugin\LiveTest;

class Plugin extends \Engine\TCPlugin {

  /**
   * @return array
   */
  public function details() {
    return [
      'name' => 'Live Test Demo',
      'description' => 'Demonstration plugin.',
      'author' => 'stepGT',
      'icon' => 'icon-leaf',
    ];
  }

  public function init() {
  }
}
