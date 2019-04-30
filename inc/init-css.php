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
        wp_deregister_style('bootstrap');
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');
        wp_deregister_style('open-iconic-font');
        wp_register_style('open-iconic-font', get_template_directory_uri() . '/css/open-iconic-bootstrap.min.css');
        wp_enqueue_style('open-iconic-font');
        
    }
}

add_action('wp_print_styles', 'init_css');
?>


