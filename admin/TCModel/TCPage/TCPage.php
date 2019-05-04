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
   * @var $segment
   */
  public $segment;

  /**
   * @var $type
   */
  public $type;

  /**
   * @var $status
   */
  public $status;

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

  /**
   * @return mixed
   */
  public function getSegment() {
    return $this->segment;
  }

  /**
   * @param mixed $segment
   */
  public function setSegment($segment) {
    $this->segment = $segment;
  }

  /**
   * @return mixed
   */
  public function getType() {
    return $this->type;
  }

  /**
   * @param mixed $type
   */
  public function setType($type) {
    $this->type = $type;
  }

  /**
   * @return mixed
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * @param mixed $status
   */
  public function setStatus($status) {
    $this->status = $status;
  }
}