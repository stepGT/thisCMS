<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/20/2018
 * Time: 11:14 PM
 */

namespace Engine;

use Engine\TCCore\TCRouter\TCDispatchedRoute;
use Engine\TCHelper\TCCommon;

/**
 * Class TCApp
 *
 * @package Engine
 */
class TCApp {

  private $tcDi;

  public $tcRouter;

  /**
   * TCApp constructor.
   *
   * @param $tcDi
   */
  public function __construct($tcDi) {
    $this->tcDi = $tcDi;
    $this->tcRouter = $this->tcDi->tcGet('tcRouter');
  }

  /**
   * Run ThisCMS
   */
  public function tcRun() {
    try {
      require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/route.php';
      /** @var \Engine\TCCore\TCPlugin\TCPlugin $pluginService */
      $pluginService = $this->tcDi->tcGet('tcPlugin');
      $plugins = $pluginService->TCPluginGetActivePlugins();

      /** @var \Admin\TCModel\TCPlugin\TCPlugin $plugin */
      foreach ($plugins as $plugin) {
        $pluginClass = '\\Plugin\\' . $plugin->directory . '\\Plugin';
        $pluginObject = new $pluginClass($this->tcDi);

        if (method_exists($pluginClass, 'init')) {
          $pluginObject->init();
        }
      }

      $tcRouterDispatch = $this->tcRouter->tcDispatch(TCCommon::tcGetMethod(), TCCommon::tcGetPathUrl());
      // 404
      if ($tcRouterDispatch == NULL) {
        $tcRouterDispatch = new TCDispatchedRoute('TCErrorController:tcPage404');
      }
      list($tcClass, $tcAction) = explode(':', $tcRouterDispatch->getTcController(), 2);
      $tcController = '\\' . ENV . '\\TCController\\' . $tcClass;
      $tcParameters = $tcRouterDispatch->getTcParameters();
      //
      call_user_func_array([
        new $tcController($this->tcDi),
        $tcAction,
      ], $tcParameters);
    } catch (\Exception $e) {
      $e->getMessage();
      exit;
    }
  }
}