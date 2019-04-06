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
$this->tcRouter->tcAdd('settings-menus', '/admin/settings/appearance/menus/', 'TCSettingController:menus');
$this->tcRouter->tcAdd('settings-themes', '/admin/settings/appearance/themes/', 'TCSettingController:TCSettingControllerThemes');

$this->tcRouter->tcAdd('setting-update', '/admin/settings/update/', 'TCSettingController:TCSettingControllerUpdateSetting', 'POST');
$this->tcRouter->tcAdd('settings-add-menu', '/admin/setting/ajaxMenuAdd/', 'TCSettingController:ajaxMenuAdd', 'POST');
$this->tcRouter->tcAdd('settings-add-menu-item', '/admin/setting/ajaxMenuAddItem/', 'TCSettingController:ajaxMenuAddItem', 'POST');
$this->tcRouter->tcAdd('settings-sort-menu-item', '/admin/setting/ajaxMenuSortItems/', 'TCSettingController:ajaxMenuSortItems', 'POST');
$this->tcRouter->tcAdd('settings-remove-menu-item', '/admin/setting/ajaxMenuRemoveItem/', 'TCSettingController:ajaxMenuRemoveItem', 'POST');
$this->tcRouter->tcAdd('settings-update-menu-item', '/admin/setting/ajaxMenuUpdateItem/', 'TCSettingController:ajaxMenuUpdateItem', 'POST');
$this->tcRouter->tcAdd('settings-update-theme', '/admin/setting/activateTheme/', 'TCSettingController:TCSettingControllerActivateTheme', 'POST');

// Plugins Routes (GET)
$this->tcRouter->tcAdd('list-plugins', '/admin/plugins/', 'TCPluginController:TCPluginControllerListPlugins');
