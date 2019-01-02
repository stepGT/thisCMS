<?php
/**
 * Created by PhpStorm.
 * User: stepGT
 * Date: 10/29/2018
 * Time: 9:27 PM
 */
$this->tcRouter->tcAdd('login', '/admin/login/', 'TCLoginController:tcForm');
$this->tcRouter->tcAdd('auth-admin', '/admin/auth/', 'TCLoginController:tcAuthAdmin', 'POST');
$this->tcRouter->tcAdd('dashboard', '/admin/', 'TCDashboardController:tcIndex');
$this->tcRouter->tcAdd('logout', '/admin/logout/', 'TCAdminController:TCLogout');
// Pages routes GET
$this->tcRouter->tcAdd('pages', '/admin/pages/', 'TCPageController:listing');
$this->tcRouter->tcAdd('page-create', '/admin/pages/create/', 'TCPageController:create');
$this->tcRouter->tcAdd('page-edit', '/admin/pages/edit/(id:int)', 'TCPageController:edit');
// Pages routes POST
$this->tcRouter->tcAdd('page-add', '/admin/pages/add/', 'TCPageController:add', 'POST');
$this->tcRouter->tcAdd('page-update', '/admin/pages/update/', 'TCPageController:update', 'POST');