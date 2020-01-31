<?php
add_action('widgets_init', function () {
  register_widget("About_x");
});

class About_x extends WP_Widget
{

  function __construct()
  {
    $widget_ops = array(
      'classname'   => 'about_-_x',
      'description' => '输出一个图+文的模块，你可以编写关于你的信息'
    );
    parent::__construct($id_base = "about_-_x", $name = '关于我', $widget_ops);

  }

  function form($instance)
  {
    $title         = esc_attr($instance['title']);
    $name          = esc_attr($instance['name']);
    $alias         = esc_attr($instance['alias']);
    $about_content = esc_attr($instance['about_content']);
    ?>

    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">标题:</label>
      <input type="text" size="40" value="<?php echo $title; ?>"
             name="<?php echo $this->get_field_name('title'); ?>"
             id="<?php echo $this->get_field_id('title'); ?>"/>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('name'); ?>">网名:</label>
      <input type="text" size="40" value="<?php echo $name; ?>"
             name="<?php echo $this->get_field_name('name'); ?>"
             id="<?php echo $this->get_field_id('name'); ?>"/>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('alias'); ?>">别名:</label>
      <input type="text" size="40" value="<?php echo $alias; ?>"
             name="<?php echo $this->get_field_name('alias'); ?>"
             id="<?php echo $this->get_field_id('alias'); ?>"/>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('about_content'); ?>">自我介绍:</label>


      <textarea style="width:100%" name="<?php echo $this->get_field_name('about_content'); ?>"
                id="<?php echo $this->get_field_id('about_content'); ?>" cols="52"
                rows="4"><?php echo stripslashes($about_content); ?></textarea>
      <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">支持HTML！</em>
    </p>

    <?php
  }

  function update($new_instance, $old_instance)
  { // 更新保存
    return $new_instance;
  }

  function widget($args, $instance)
  { // 输出显示在页面上
    extract($args);
    $id            = $instance['id'];
    $title         = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
    $name          = apply_filters('widget_title', empty($instance['name']) ? __('') : $instance['name']);
    $alias         = apply_filters('widget_title', empty($instance['alias']) ? __('') : $instance['alias']);
    $about_content = apply_filters('widget_title', empty($instance['about_content']) ? __('') : $instance['about_content']);
    ?>


    <div class="widget card">
      <div class="about-x">
        <div class="about-x-image">
          <img src="<?php echo get_template_directory_uri() . '/images/me_270x210.jpg'; ?>" alt="Member">
        </div>
        <div class="about-x-info">
          <h3 class="text-success">
            <?php echo html_entity_decode($name); ?>
          </h3>
          <h5 class="text-secondary">
            <?php echo html_entity_decode($alias); ?>
          </h5>
          <p class="text-secondary">
            <?php echo html_entity_decode($about_content); ?>
          </p>

        </div>

        <div class="social-touch">
          <a class="wechart-touch" href="#"></a>
          <a class="qq-touch" href="#"></a>
          <a class="weibo-touch" href="#"></a>
        </div>
      </div>
    </div>
    <?php
  }
}

?>
