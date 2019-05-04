<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/29/2018
 * Time: 9:27 PM
 */
$this->tcRouter->tcAdd('home', '/', 'TCHomeController:tcIndex');
$this->tcRouter->tcAdd('page', '/page/(segment:any)', 'TCPageController:show');