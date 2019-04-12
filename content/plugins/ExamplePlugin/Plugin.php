<?php

namespace Plugin\ExamplePlugin;

class Plugin extends \Engine\TCPlugin {

  /**
   * @return array
   */
  public function details() {
    return [
      'name' => 'Plugin Demo',
      'description' => 'Demonstration plugin.',
      'author' => 'stepGT',
      'icon' => 'icon-leaf',
    ];
  }

  public function init() {
  }
}
