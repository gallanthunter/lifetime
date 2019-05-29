<?php
/**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/11 19:55
 */
?>
<?php

class Hotnews extends WP_Widget
{
    function Hotnews()
    {
        $widget_ops = array(
            'description' => '全站热门文章小工具',
            'classname'   => 'widget_hot_news'
        );
        parent::WP_Widget(false, $name = '全站热门文章', $widget_ops);
        
    }
    
    function form($instance)
    { // 给小工具(widget) 添加表单内容
        $instance  = wp_parse_args((array)$instance, array(
            'title'     => '热点文章',
            'posts_num' => '10',
            'time'      => '0',
        ));
        $title     = strip_tags($instance['title']);
        $posts_num = strip_tags($instance['posts_num']);
        $time      = strip_tags($instance['time']);
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
        
        <?php
    }
    
    function update($new_instance, $old_instance)
    { // 更新保存
        $instance              = $old_instance;
        $instance['title']     = strip_tags($new_instance['title']);
        $instance['posts_num'] = strip_tags($new_instance['posts_num']);
        $instance['time']      = strip_tags($new_instance['time']);
        return $instance;
    }
    
    function widget($args, $instance)
    { // 输出显示在前台页面上
        extract($args);
        // 标题
        $title = apply_filters('widget_title', empty($instance['title']) ? __('如果没有填写，我就默认显示啦') : $instance['title']);
        // 描述
        $content = apply_filters('widget_title', empty($instance['content']) ? __('如果没有填写，我就默认显示啦') : $instance['content']);
        extract($args, EXTR_SKIP);
        $title     = apply_filters('widget_name', $instance['title']);
        $posts_num = $instance['posts_num'];
        $time      = $instance['time'];
        echo widget_cat_post($posts_num, $time);
    }
}

register_widget('Hotnews');
function widget_new_post($posts_num, $time)
{
    ?>
    <div class="widget card">
        <div class="host-post">
            <ul>
                <?php
                $post_num    = $posts_num;
                $args        = array(
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                    'posts_per_page'   => $posts_num,
                    'meta_key'         => 'views',
                    'orderby'          => 'meta_value_num',
                    'order'            => 'DESC',
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
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <i class="wi wi-right"></i><span class="hot-post-title"><?php the_title(); ?></span>
                        </a>
                    </li>
                <?php }
                wp_reset_query(); ?>
            </ul>
        </div>
    </div>
    <?php
}

?>