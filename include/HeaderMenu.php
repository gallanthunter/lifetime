<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 15:15
 */

class HeaderMenu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth, $args)
    {
        global $wp_query;
        $indent      = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = ' ';
        $classes     = empty($item->classes) ? array() : (array)$item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        $output      .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
        $attributes  = "";
        if ($item->url != '#') {
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        }
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $args->link_after;
        if (!empty($item->description)) {
            $item_output .= '<img src=' . '"' . $item->description . '"' . 'alt="' . apply_filters('the_title', $item->title, $item->ID) . '"/>';
        }
        $item_output .= '<span><b>' . apply_filters('the_title', $item->title, $item->ID) . '</b>';
        if (!empty($item->attr_title)) {
            $item_output .= '<p>' . esc_attr($item->attr_title) . '</p></span>';
        }
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output      .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}