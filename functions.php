<?php
/**
 * Description: functions.php
 * Author: Zhang Zhijun
 * Date: 2019/3/22 21:32
 */
ob_start();
if (!defined("THEME_INC_PATH"))
    define("THEME_INC_PATH", dirname(__FILE__) . "/inc");
// include_once(THEME_INC_PATH . "/init-css.php");
// include_once(THEME_INC_PATH . "/init-js.php");
include_once(THEME_INC_PATH . "/HeaderMenu.php");

// 移除head多余的link信息
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'rel_canonical');
remove_action('pre_post_update', 'wp_save_post_revision');
//add actions and filters
//set excerpt length: 500
add_filter('excerpt_length', 'custom_excerpt_length', 999);
// remove wordpress CSS and Js version
add_filter('style_loader_src', 'remove_css_js_ver', 999);
add_filter('script_loader_src', 'remove_css_js_ver', 999);
//disable emojis
add_action('init', 'disable_emojis');
//use local emojis
add_filter('smilies_src', 'custom_smilies_src', 1, 10);
//移除版本号
function remove_css_js_ver($src)
{
    if (strpos($src, 'ver=' . get_bloginfo('version')))
        $src = remove_query_arg('ver', $src);
    return $src;
}

//注册导航菜单
register_nav_menus(array('header-menu' => __('菜单导航'), 'footer-menu' => __('底部菜单'), 'friendlink-menu' => __('友情链接'),));
//自定义摘要长度
function custom_excerpt_length($length)
{
    return 500;
}

// get category root id
function get_category_root_id($cat)
{
    $this_category = get_category($cat);   // 取得当前分类
    while ($this_category->category_parent) // 若当前分类有上级分类时，循环
    {
        $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
    }
    return $this_category->term_id; // 返回根分类的id号
}

//获取缩略图URL
function get_post_thumbnail_url($post_id)
{
    $post_id      = (null === $post_id) ? get_the_ID() : $post_id;
    $thumbnail_id = get_post_thumbnail_id($post_id->ID);
    if ($thumbnail_id) {
        $thumb = wp_get_attachment_image_src($thumbnail_id, 'news-vedio-thumb');
        return $thumb[0];
    } else {
        return false;
    }
}

// sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => '默认侧边栏', 'id' => 'sidebar-left', 'description' => '默认两栏内页的侧边栏', 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h2>', 'after_title' => '</h2>'
    ));
    
}
function get_thumbnail($thumbnail_size)
{
    if (get_option('mytheme_' . $thumbnail_size . '_thumbnails')) {
        $case_thumbnails = get_option('mytheme_' . $thumbnail_size . '_thumbnails');
    } else {
        $case_thumbnails = get_bloginfo('template_url') . '/thumbnails/' . $thumbnail_size . '.jpg';
    }
    $title = get_the_title();
    if (has_post_thumbnail()) {
        the_post_thumbnail($thumbnail_size, array('alt' => $title, 'title' => $title));
    } else {
        echo '<img alt="' . $title . '" title="' . $title . '" src="' . $case_thumbnails . '" />';
    }
    
}