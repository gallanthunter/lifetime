<?php
/**
 * Description: functions.php
 * Author: Zhang Zhijun
 * Date: 2019/3/22 21:32
 */
ob_start();
if (!defined("THEME_INC_PATH"))
    define("THEME_INC_PATH", dirname(__FILE__) . "/include");
if (!defined("THEME_WIDGET_PATH"))
    define("THEME_WIDGET_PATH", dirname(__FILE__) . "/widget");
// include_once(THEME_INC_PATH . "/init-css.php");
// include_once(THEME_INC_PATH . "/init-js.php");
// include_once(THEME_INC_PATH . "/HeaderMenu.php");
include_once(THEME_INC_PATH . "/pagination.php");
include_once(THEME_INC_PATH . "/breadcrumb.php");
include_once(THEME_WIDGET_PATH . "/index.php");
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

//use local emojis
add_filter('smilies_src', 'custom_smilies_src', 1, 10);
// 自动修改上传文件名称
add_filter('wp_handle_upload_prefilter', 'git_upload_filter');
//disable emojis
add_action('init', 'disable_emojis');
add_action('widgets_init', 'widgets_init');
//移除版本号
function remove_css_js_ver($src)
{
    if (strpos($src, 'ver=' . get_bloginfo('version')))
        $src = remove_query_arg('ver', $src);
    return $src;
}

//注册导航菜单
register_nav_menus(array(
    'header-menu'     => __('菜单导航'),
    'footer-menu'     => __('底部菜单'),
    'friendlink-menu' => __('友情链接'),
));
//自定义摘要长度
function custom_excerpt_length($length)
{
    return 200;
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

function get_thumbnail($thumbnail_size)
{
    if (get_option('mytheme_' . $thumbnail_size . '_thumbnails')) {
        $case_thumbnails = get_option('mytheme_' . $thumbnail_size . '_thumbnails');
    } else {
        $case_thumbnails = get_bloginfo('template_url') . '/thumbnails/' . $thumbnail_size . '.jpg';
    }
    $title = get_the_title();
    if (has_post_thumbnail()) {
        the_post_thumbnail($thumbnail_size, array(
            'alt'   => $title,
            'title' => $title
        ));
    } else {
        echo '<img alt="' . $title . '" title="' . $title . '" src="' . $case_thumbnails . '" />';
    }
    
}

/**
 * getPostViews()函数
 * 功能：获取阅读数量
 * 在需要显示浏览次数的位置，调用此函数
 * @Param object|int $postID   文章的id
 * @Return string $count          文章阅读数量
 */
function get_post_views($post_id)
{
    $count_key = 'views';
    $count     = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }
    echo number_format_i18n($count);
}

/**
 * setPostViews()函数
 * 功能：设置或更新阅读数量
 * 在内容页(single.php，或page.php )调用此函数
 * @Param object|int $postID   文章的id
 * @Return string $count          文章阅读数量
 */
function set_post_views()
{
    global $post;
    $post_id   = $post->ID;
    $count_key = 'views';
    $count     = get_post_meta($post_id, $count_key, true);
    if (is_single() || is_page()) {
        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}

add_action('get_header', 'set_post_views');
/**
 * 注册侧边栏工具
 */
function widgets_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'name'          => '全站侧栏',
            'id'            => 'widget_site_sidebar',
            'before_widget' => '<div class="widget %2$s card">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title card-header">',
            'after_title'   => '></div>'
        ));
        register_sidebar(array(
            'name'          => '首页侧栏',
            'id'            => 'widget_index_sidebar',
            'before_widget' => '<div class="widget %2$s card">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title card-header">',
            'after_title'   => '></div>'
        ));
        register_sidebar(array(
            'name'          => '分类页侧栏',
            'id'            => 'widget_cat_sidebar',
            'before_widget' => '<div class="widget %2$s card">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title card-header">',
            'after_title'   => '></div>'
        ));
        register_sidebar(array(
            'name'          => '文章页侧栏',
            'id'            => 'widget_post_sidebar',
            'before_widget' => '<div class="widget %2$s card">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title card-header">',
            'after_title'   => '></div>'
        ));
        register_sidebar(array(
            'name'          => '其他页侧栏',
            'id'            => 'widget_other_sidebar',
            'before_widget' => '<div class="widget %2$s card">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-title card-header">',
            'after_title'   => '></div>'
        ));
    }
}

/**
 * git_upload_filter()函数
 * 功能：上传文件重命名
 *
 * @Param $file   文件名
 * @Return $file    重命名后的文件名
 */
function git_upload_filter($file)
{
    $time         = date("YmdHis");
    $file['name'] = $time . "" . mt_rand(1, 100) . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
    return $file;
}

?>