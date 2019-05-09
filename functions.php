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
register_nav_menus(array(
    'header-menu' => __('菜单导航'), 'footer-menu' => __('底部菜单'), 'friendlink-menu' => __('友情链接'),
));
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
 * 注册默认侧边栏工具
 */
function widgets_init()
{
    register_sidebar(array(
        'name' => __('默认侧边栏', 'theme-slug'), 'id' => 'widget_default', 'description' => __('默认两栏内页的侧边栏', 'theme-slug'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<div class="widget-title">', 'after_title' => '</div>',
    ));
}

add_action('widgets_init', 'widgets_init');
/**
 * WordPress 添加面包屑导航
 * https://www.wpdaxue.com/wordpress-add-a-breadcrumb.html
 */
function get_breadcrumbs()
{
    $delimiter = '»'; // 分隔符
    $before    = '<span class="current">'; // 在当前链接前插入
    $after     = '</span>'; // 在当前链接后插入
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<div itemscope itemtype="http://schema.org/WebPage" id="crumbs">' . __('You are here:', 'cmp');
        global $post;
        $homeLink = home_url();
        echo ' <a itemprop="breadcrumb" href="' . $homeLink . '">' . __('Home', 'cmp') . '</a> ' . $delimiter . ' ';
        if (is_category()) { // 分类 存档
            global $wp_query;
            $cat_obj   = $wp_query->get_queried_object();
            $thisCat   = $cat_obj->term_id;
            $thisCat   = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) {
                $cat_code = get_category_parents($parentCat, true, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
            }
            echo $before . '' . single_cat_title('', false) . '' . $after;
        } elseif (is_day()) { // 天 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a itemprop="breadcrumb"  href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) { // 月 存档
            echo '<a itemprop="breadcrumb" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) { // 年 存档
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) { // 文章
            if (get_post_type() != 'post') { // 自定义文章类型
                $post_type = get_post_type_object(get_post_type());
                $slug      = $post_type->rewrite;
                echo '<a itemprop="breadcrumb" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else { // 文章 post
                $cat      = get_the_category();
                $cat      = $cat[0];
                $cat_code = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                echo $cat_code = str_replace('<a', '<a itemprop="breadcrumb"', $cat_code);
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) { // 附件
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            $cat    = $cat[0];
            echo '<a itemprop="breadcrumb" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) { // 页面
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) { // 父级页面
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page          = get_page($parent_id);
                $breadcrumbs[] = '<a itemprop="breadcrumb" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id     = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) { // 搜索结果
            echo $before;
            printf(__('Search Results for: %s', 'cmp'), get_search_query());
            echo $after;
        } elseif (is_tag()) { //标签 存档
            echo $before;
            printf(__('Tag Archives: %s', 'cmp'), single_tag_title('', false));
            echo $after;
        } elseif (is_author()) { // 作者存档
            global $author;
            $userdata = get_userdata($author);
            echo $before;
            printf(__('Author Archives: %s', 'cmp'), $userdata->display_name);
            echo $after;
        } elseif (is_404()) { // 404 页面
            echo $before;
            _e('Not Found', 'cmp');
            echo $after;
        }
        if (get_query_var('paged')) { // 分页
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo sprintf(__('( Page %s )', 'cmp'), get_query_var('paged'));
        }
        echo '</div>';
    }
}

/**
 * 数字分页函数
 * @Param int $range            数字分页的宽度
 * @Return string|empty        输出分页的HTML代码
 */
function bootstrap_pagenavi($range = 4)
{
    global $paged, $wp_query;
    if (!$max_page) {
        $max_page = $wp_query->max_num_pages;
    }
    if ($max_page > 1) {
        echo "<ul class='pagination justify-content-center'>";
        if (!$paged) {
            $paged = 1;
        }
        if ($paged != 1) {
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link(1) . "' title='跳转到首页'>首页</a></li>";
        }
        echo '<li class="page-item">';
        previous_posts_link('上一页');
        echo '</li>';
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo '<li class="page-item';
                if ($i == $paged)
                    echo ' active';
                echo '"><a class="page-link"';
                echo " href='" . get_pagenum_link($i) . "'";
                echo ">$i</a></li>";
            }
        }
        echo '<li class="page-item">';
        next_posts_link('下一页');
        echo '</li>';
        if ($paged != $max_page) {
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link($max_page) . "'  title='跳转到最后一页'>尾页</a></li>";
        }
        echo '<span>共[' . $max_page . ']页</span>';
        echo "</ul>\n";
    }
}

?>