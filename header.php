<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:12
 */
?>
<!doctype html>
<html class="no-js" lang="zh">

<head>
    <meta charset="utf-8">
    <title>jungedushu</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!--    <link rel="icon" sizes="192x192" href="img/icon/app-icon72x72@2x.png">-->

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <!--    <link rel="apple-touch-icon-precomposed" href="img/icon/app-icon72x72@2x.png">-->

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <!--    <meta name="msapplication-TileImage" content="img/icon/app-icon72x72@2x.png">-->
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!--    <link rel="manifest" href="site.webmanifest">-->
    <!-- Place favicon.ico in the root directory -->
    <!--    <link rel="apple-touch-icon" href="icon.png">-->


    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css'; ?>">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>

<body>

<header>
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-xl-2">
                <div class="logo"></div>
            </div>
            <div class="col-xl-10">
                <div class="header-menu font-weight-bold">
                    <?php ob_start();
                    wp_nav_menu(array(
                        'container' => false, 'theme_location' => 'header-menu', 'items_wrap' => '<ul class="header-menu-items">%3$s</ul>'
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>