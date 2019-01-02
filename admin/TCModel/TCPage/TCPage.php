<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 12/8/2018
 * Time: 6:58 PM
 */

namespace Admin\TCModel\TCPage;

use Engine\TCCore\TCDatabase\TCActiveRecord;

class TCPage {

  use TCActiveRecord;

  /**
   * @var string
   */
  protected $table = 'tc_page';

  /**
   * @var $id
   */
  public $id;

  /**
   * @var $title
   */
  public $title;

  /**
   * @var $content
   */
  public $content;

  /**
   * @var $date
   */
  public $date;


  /**
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * @param $title
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * @return mixed
   */
  public function getContent() {
    return $this->content;
  }

  /**
   * @param $content
   */
  public function setContent($content) {
    $this->content = $content;
  }

  /**
   * @return mixed
   */
  public function getDate() {
    return $this->date;
  }

  /**
   * @param $role
   */
  public function setDate($date) {
    $this->date = $date;
  }
}