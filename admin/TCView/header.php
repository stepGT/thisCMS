<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Админ-панель</title>
    <link href="/admin/TCAssets/semantic/semantic.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/TCAssets/semantic/components/dropdown.min.css">
    <link rel="stylesheet" href="/admin/TCAssets/semantic/components/transition.min.css">
    <link rel="stylesheet" href="/admin/TCAssets/semantic/components/icon.min.css">
    <link rel="stylesheet" href="/admin/TCAssets/semantic/components/segment.min.css">
    <link rel="stylesheet" href="/admin/TCAssets/semantic/components/sidebar.min.css">
    <!-- Custom styles for this template -->
    <link href="/admin/TCAssets/css/dashboard.css" rel="stylesheet">
    <!-- simplelineicons for this template -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="/admin/TCAssets/js/plugins/redactor/redactor.css">
</head>
<body>
<header>
    <div class="ui borderless main menu top-header">
        <div class="ui container">
            <div href="/admin/" class="header item logo-item">
                <img class="logo" src="/admin/TCAssets/images/logo.png">
            </div>
          <?php foreach (TCCustomize::getInstance()->getAdminMenuItems() as $key => $item): ?>
              <a class="item" href="<?=$item['urlPath'];?>">
                  <i class="<?=$item['classIcon'];?>"></i>
                <?=$lang->dashboardMenu[$key];?>
              </a>
          <?php endforeach; ?>
        </div>
    </div>
</header>