<?php

class About_x extends WP_Widget
{
    
    function about_x()
    {
        $widget_ops = array(
            'classname'   => 'about_-_x',
            'description' => '输出一个图+文的模块，你可以编写关于你的信息'
        );
        parent::WP_Widget($id_base = "about_-_x", $name = '关于我', $widget_ops);
        
    }
    
    function form($instance)
    {
        $about_content = esc_attr($instance['about_content']);
        $title         = esc_attr($instance['title']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">标题:</label>
            <input type="text" size="40" value="<?php echo $title; ?>"
                   name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>"/>
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
        $about_content = apply_filters('widget_title', empty($instance['about_content']) ? __('') : $instance['about_content']);
        $title         = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
        ?>


        <div class="widget card">
            <div class="about-x">
                <div class="about-x-image">
                    <img src="<?php echo get_template_directory_uri() . '/images/member_270x210.jpg'; ?>" alt="Member">
                </div>
                <div class="about-x-info">
                    <?php echo html_entity_decode($about_content); ?>
                </div>

                <div class="social-touch">
                    <a class="fb-touch" href="#"></a>
                    <a class="tweet-touch" href="#"></a>
                    <a class="linkedin-touch" href="#"></a>
                </div>
            </div>
        </div>
        <?php
    }
}

register_widget('About_x');
?>