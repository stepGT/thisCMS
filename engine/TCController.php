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


  /**
   * TCController constructor.
   *
   * @param \Engine\TCDI\TCDI $tcDi
   */
  public function __construct(TCDI $tcDi) {
    $this->tcDi = $tcDi;
    $this->tcView = $this->tcDi->tcGet('tcView');
  }
}