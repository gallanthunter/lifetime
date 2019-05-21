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
    <title><?php get_template_part('template-parts/header/header', 'title'); ?></title>
    <?php get_template_part('template-parts/header/header', 'meta'); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/about-x.css'; ?>">
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