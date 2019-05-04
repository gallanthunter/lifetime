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
    <link rel="icon" sizes="192x192" href="img/icon/app-icon72x72@2x.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="img/icon/app-icon72x72@2x.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="img/icon/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <link rel="manifest" href="site.webmanifest">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="icon.png">


    <link rel="stylesheet" href="<?php get_template_directory_uri() . '/css/amazeui.flat.min.css'; ?>">
    <link rel="stylesheet" href="<?php get_template_directory_uri() . '/css/amazeui.min.css'; ?>">
    <link rel="stylesheet" href="<?php get_template_directory_uri() . '/style.css'; ?>

    <meta name="theme-color" content="#fafafa">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

</head>

<body>

<header>
    <div class="am-g am-g-fixed am-g-collapse">
        <div class="am-u-lg-2">
            <div class="logo"></div>
        </div>
        <div class="am-u-lg-10">
            <div class="menu">
                <?php
                ob_start();
                wp_nav_menu(array(
                    'walker' => new HeaderMenu(), 'container' => false, 'theme_location' => 'header-menu', 'items_wrap' => '<ul class="header_pic_menu">%3$s</ul>'
                ));
                ?>
            </div>
        </div>
    </div>
</header>