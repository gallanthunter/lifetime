<?php
/*
Widget Name:当前同分类文章 
Description:显示当前文章分类下其他文章，根据排序条件展示。
Version:1.1  
Author:雅兮网  
Author URI:https://www.yaxi.net
*/
add_action('widgets_init', create_function('', 'return register_widget("cat_post");'));

class cat_post extends WP_Widget
{
    
    function cat_post()
    {
        $widget_ops = array('description' => '展示当前文章分类下其他文章(建议只在文章页使用)。');
        $this->WP_Widget('cat_post', '同分类文章', $widget_ops);
    }
    
    
    
    function form($instance)
    {
        $instance  = wp_parse_args((array)$instance, array(
            'title'     => '本栏目文章',
            'posts_num' => '5',
            'time'      => '0',
            'orderby'   => 'date',
        ));
        $title     = esc_attr($instance['title']);
        $posts_num = esc_attr($instance['posts_num']);
        $time      = esc_attr($instance['time']);
        $orderby   = esc_attr($instance['orderby']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"> 填写标题：</label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
                   type="text" value="<?php echo $instance['title']; ?>"/>

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('posts_num'); ?>"> 显示数目：</label>
            <input id="<?php echo $this->get_field_id('posts_num'); ?>"
                   name="<?php echo $this->get_field_name('posts_num'); ?>" type="number"
                   value="<?php echo $instance['posts_num']; ?>"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('time'); ?>">时间限制：</label>
            <select id="<?php echo esc_attr($this->get_field_id("time")); ?>"
                    name="<?php echo esc_attr($this->get_field_name("time")); ?>">
                <option value="0"<?php selected($instance["time"], "0"); ?>>不限时间</option>
                <option value="1 year ago"<?php selected($instance["time"], "1 year ago"); ?>>一年内</option>
                <option value="1 month ago"<?php selected($instance["time"], "1 month ago"); ?>>一月内</option>
                <option value="1 week ago"<?php selected($instance["time"], "1 week ago"); ?>>一周内</option>
                <option value="1 day ago"<?php selected($instance["time"], "1 day ago"); ?>>24小时内</option>
            </select>

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>">排序依据：</label>
            <select id="<?php echo esc_attr($this->get_field_id("orderby")); ?>"
                    name="<?php echo esc_attr($this->get_field_name("orderby")); ?>">
                <option value="date"<?php selected($instance["orderby"], "date"); ?>>发布时间</option>
                <option value="meta_value_num"<?php selected($instance["orderby"], "meta_value_num"); ?>>按阅读量</option>
                <option value="title"<?php selected($instance["orderby"], "title"); ?>>文章标题</option>
                <option value="rand"<?php selected($instance["orderby"], "rand"); ?>>随机排序</option>
                <option value="comment_count"<?php selected($instance["orderby"], "comment_count"); ?>>评论数量</option>
                <option value="modified"<?php selected($instance["orderby"], "modified"); ?>>修改时间</option>
                <option value="ID"<?php selected($instance["orderby"], "ID"); ?>>文章ID</option>
            </select>
        </p>
        <?php
    }
    
    function update($new_instance, $old_instance)
    {
        // $instance['title']     = strip_tags($new_instance['title']);
        // $instance['posts_num'] = strip_tags($new_instance['posts_num']);
        // $instance['time']      = strip_tags($new_instance['time']);
        // $instance['orderby']   = strip_tags($new_instance['orderby']);
        // return $instance;
        return $new_instance;
    }
    
    function widget($args, $instance)
    {
        extract($args);
        $title     = apply_filters('widget_title', $instance['title']);
        $posts_num = $instance['posts_num'];
        $time      = $instance['time'];
        $orderby   = $instance['orderby'];
        widget_cat_post($title, $posts_num, $time, $orderby);
    }
}

register_widget('cat_post');
function widget_cat_post($title, $posts_num, $time, $orderby)
{
    ?>
    <div class="widget cat-post card">
        <div class="widget-title card-header"><?php echo $title ?></div>
        <ul>
            <?php
            $category    = get_the_category();
            $cats        = $category[0]->cat_ID;
            $args        = array(
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'posts_per_page'   => $posts_num,
                'meta_key'         => 'views',
                'orderby'          => $orderby,
                'order'            => 'DESC',
                'cat'              => $cats,
                'caller_get_posts' => 1,
                'date_query'       => array(
                    array(
                        'after' => $time,
                    ),
                ),
            );
            $query_posts = new WP_Query();
            $query_posts->query($args);
            while ($query_posts->have_posts()) {
                $query_posts->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?> </a>
                </li>
            <?php }
            wp_reset_query(); ?>
        </ul>
    </div>
    <?php
}

?>
