<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/21/2018
 * Time: 8:01 PM
 */

namespace Engine;

use Engine\TCCore\TCDatabase\TCQueryBuilder;
use Engine\TCDI\TCDI;

abstract class TCModel {

  protected $tcDi;

  protected $tcDb;

  protected $tcConfig;

  public $tcQueryBuilder;

  /**
   * TCController constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi     = $tcDi;
    $this->tcDB     = $this->tcDi->tcGet('tcDB');
    $this->tcConfig = $this->tcDi->tcGet('tcConfig');
    $this->tcQueryBuilder = new TCQueryBuilder();
  }
}