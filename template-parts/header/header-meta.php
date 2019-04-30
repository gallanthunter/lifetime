<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 12:18
 */
?>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
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