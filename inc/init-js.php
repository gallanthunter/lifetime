<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 10:20
 */
function init_js()
{
    if (!is_admin()) {
        // Jquery first, then popper.js, then bootstrap.js
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . "/js/jquery.min.js");
        wp_enqueue_script('jquery');
        wp_deregister_script('jqueryform');
        wp_register_script('jqueryform', get_template_directory_uri() . "/js/jquery.form.js");
        wp_enqueue_script('jqueryform');
        wp_deregister_script('bootstrap');
        wp_register_script('bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js");
        wp_enqueue_script('bootstrap');
        wp_deregister_script('belatedPNG');
        wp_register_script('belatedPNG', get_template_directory_uri() . '/js/DD_belatedPNG_0.0.8a-min.js');
        wp_enqueue_script('belatedPNG');
        wp_deregister_script('photoswipe');
        wp_register_script('photoswipe', get_template_directory_uri() . "/js/photoswipe.min.js");
        wp_enqueue_script('photoswipe');
        wp_deregister_script('photoswipe');
        wp_register_script('photoswipe', get_template_directory_uri() . "/js/photoswipe-ui-default.min.js");
        wp_enqueue_script('photoswipe');
        wp_deregister_script('script');
        wp_register_script('script', get_template_directory_uri() . "/js/script.js");
        wp_enqueue_script('script');
        
    }
}

add_action('wp_print_styles', 'init_js');
?>