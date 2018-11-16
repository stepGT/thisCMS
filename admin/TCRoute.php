<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/29/2018
 * Time: 9:27 PM
 */
$this->tcRouter->tcAdd('login', '/admin/login/', 'TCLoginController:tcForm');
$this->tcRouter->tcAdd('dashboard', '/admin/', 'TCDashboardController:tcIndex');