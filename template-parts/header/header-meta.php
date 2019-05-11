<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 12:18
 */
?>

<?php
ob_start();
?>
    <meta name="keywords" content=" <?php if (is_front_page() || is_home()) {
        echo get_option('mytheme_keywords');
    } else if (is_page()) {
        if (get_post_meta($post->ID, "关键字", true)) {
            echo get_post_meta($post->ID, "关键字", true);
        } else {
            echo get_post_meta($post->ID, "关键字", true);
        }
    } else if (is_single()) {
        if (get_post_meta($post->ID, "关键字", true)) {
            if (get_post_meta($post->ID, "关键字", true)) {
                echo get_post_meta($post->ID, "关键字", true);
            } else {
                echo get_option('mytheme_keywords');
            }
        }
        // 如果是类目页面, 显示类目表述
    } else {
        echo get_option('mytheme_keywords');
    } ?>   "/>
    <meta name="description" content="<?php if (is_front_page() || is_home()) {
        echo get_option('mytheme_description');
        
        // 如果是文章详细页面和独立页面
    } else if (is_page()) {
        if (get_post_meta($post->ID, "描述", true)) {
            echo get_post_meta($post->ID, "描述", true);
        } else {
            echo substr(strip_tags($post->post_content), 0, 420);
        }
        // 如果是类目页面, 显示类目表述
    } else if (is_single()) {
        if (get_post_meta($post->ID, "描述", true)) {
            echo get_post_meta($post->ID, "描述", true);
        } else {
            echo substr(strip_tags($post->post_content), 0, 420);
        }
        
        // 如果是类目页面, 显示类目表述
    } else {
        echo get_option('mytheme_description');
    }
    ?>"/>

<?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow"/>
    <?php
};
?>

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
