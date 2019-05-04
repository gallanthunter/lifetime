<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 10:16
 */
function init_css()
{
    if (!is_admin()) {
        wp_deregister_style('stylesheet');
        wp_register_style('stylesheet', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('stylesheet');
        wp_deregister_style('amazeui');
        wp_register_style('amazeui', get_template_directory_uri() . '/css/amazeui.min.css');
        wp_enqueue_style('amazeui');
        wp_deregister_style('amazeuiflat');
        wp_register_style('amazeuiflat', get_template_directory_uri() . '/css/amazeui.flat.min.css');
        wp_enqueue_style('amazeuiflat');
    }
}

add_action('wp_print_styles', 'init_css');
?>


