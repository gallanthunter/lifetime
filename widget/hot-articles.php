<?php
/**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/11 19:55
 */
?>
<?php
add_action('widgets_init', function () {
  register_widget("HotArticles");
});

class HotArticles extends WP_Widget
{
  function __construct()
  {
    $widget_ops = array(
      'description' => '全站热门文章小工具',
      // 'classname'   => 'widget_hot_news'
    );
    parent::__construct(false, $name = '全站热门文章', $widget_ops);

  }

  function form($instance)
  { // 给小工具(widget) 添加表单内容
    $instance  = wp_parse_args((array)$instance, array(
      'title'     => '热点文章',
      'posts_num' => '10',
      'time'      => '0',
    ));
    $title     = esc_attr($instance['title']);
    $posts_num = esc_attr($instance['posts_num']);
    $time      = esc_attr($instance['time']);
    ?>
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"> 填写标题：</label>
      <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
             type="text" value="<?php echo $title; ?>"/>

    </p>
    <p>
      <label for="<?php echo $this->get_field_id('posts_num'); ?>"> 显示数目：</label>
      <input id="<?php echo $this->get_field_id('posts_num'); ?>"
             name="<?php echo $this->get_field_name('posts_num'); ?>" type="number"
             value="<?php echo $posts_num; ?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('time'); ?>">时间限制：</label>
      <select id="<?php echo esc_attr($this->get_field_id("time")); ?>"
              name="<?php echo esc_attr($this->get_field_name("time")); ?>">
        <option value="0"<?php selected($time, "0"); ?>>不限时间</option>
        <option value="1 year ago"<?php selected($time, "1 year ago"); ?>>一年内</option>
        <option value="1 month ago"<?php selected($time, "1 month ago"); ?>>一月内</option>
        <option value="1 week ago"<?php selected($time, "1 week ago"); ?>>一周内</option>
        <option value="1 day ago"<?php selected($time, "1 day ago"); ?>>24小时内</option>
      </select>

    </p>

    <?php
  }

  function update($new_instance, $old_instance)
  {
    return $new_instance;
  }

  function widget($args, $instance)
  { // 输出显示在前台页面上
    extract($args);
    $title     = apply_filters('widget_title', $instance['title']);
    $posts_num = apply_filters('widget_title', $instance['posts_num']);
    $time      = apply_filters('widget_title', $instance['time']);
    echo widget_hot_articles($title, $posts_num, $time);
  }
}

register_widget('HotArticles');
function widget_hot_articles($title, $posts_num, $time)
{
  ?>
  <div class="widget hot-articles card">
    <div class="widget-title card-header"><?php echo $title ?></div>
    <ul>
      <?php
      $args        = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'posts_per_page'      => $posts_num,
        'meta_key'            => 'views',
        'orderby'             => 'meta_value_num',
        // 'order'            => 'DESC',
        'ignore_sticky_posts' => 1,
        //忽略置顶
        'date_query'          => array(
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
