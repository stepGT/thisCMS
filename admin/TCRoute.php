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
// Posts routes GET
$this->tcRouter->tcAdd('posts', '/admin/posts/', 'TCPostController:listing');
$this->tcRouter->tcAdd('post-create', '/admin/posts/create/', 'TCPostController:create');
$this->tcRouter->tcAdd('post-edit', '/admin/posts/edit/(id:int)', 'TCPostController:edit');
// Posts routes POST
$this->tcRouter->tcAdd('post-add', '/admin/posts/add/', 'TCPostController:add', 'POST');
$this->tcRouter->tcAdd('post-update', '/admin/posts/update/', 'TCPostController:update', 'POST');
// Settings Routes (GET)
$this->tcRouter->tcAdd('settings-general', '/admin/settings/general/', 'TCSettingController:general');

$this->tcRouter->tcAdd('setting-update', '/admin/settings/update/', 'TCSettingController:TCSettingControllerUpdateSetting', 'POST');