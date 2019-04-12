<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 8:01 PM
 */

namespace Engine;


use Engine\TCDI\TCDI;

abstract class TCController {

  protected $tcDi;

  protected $tcDb;

  protected $tcView;

  protected $tcConfig;

  protected $tcRequest;

  protected $tcLoad;

  /**
   * @var \Engine\TCCore\TCPlugin\TCPlugin
   */
  protected $TCControllerPlugin;

  /**
   * TCController constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi      = $tcDi;
    $this->tcDB      = $this->tcDi->tcGet('tcDB');
    $this->tcView    = $this->tcDi->tcGet('tcView');
    $this->tcConfig  = $this->tcDi->tcGet('tcConfig');
    $this->tcRequest = $this->tcDi->tcGet('tcRequest');
    $this->tcLoad    = $this->tcDi->tcGet('tcLoad');
    $this->initVars();
  }

  /**
   * @param $key
   *
   * @return mixed
   */
  public function __get($key) {
    return $this->tcDi->tcGet($key);
  }

  /**
   * @return $this
   */
  public function initVars() {
    $vars = array_keys(get_object_vars($this));
    //
    foreach ($vars as $var) {
      //
      if ($this->tcDi->tcHas($var)) {
        $this->{$var} = $this->tcDi->tcGet($var);
      }
    }
    return $this;
  }

  /**
   * @return mixed
   */
  public function TCControllerGetRequest() {
    return $this->tcRequest;
  }

  /**
   * @return mixed
   */
  public function TCControllerGetPlugin() {
    return $this->TCControllerPlugin;
  }
}