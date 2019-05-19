<?php

class about_x extends WP_Widget
{
    
    function about_x()
    {
        $widget_ops = array(
            'classname'   => 'about_x',
            'description' => '输出一个图+文的模块，你可以编写关于你的信息'
        );
        parent::WP_Widget($id_base = "about_x", $name = '关于我', $widget_ops);
        
    }
    
    function form($instance)
    {
        
        $left_right     = esc_attr($instance['left_right']);
        $first_mod      = esc_attr($instance['first_mod']);
        $my_b_images    = esc_attr($instance['my_b_images']);
        $my_b_images_ad = esc_attr($instance['my_b_images_ad']);
        $nnmber         = esc_attr($instance['nnmber']);
        $nnmber2        = esc_attr($instance['nnmber2']);
        $w_cat          = esc_attr($instance['w_cat']);
        $about_content  = esc_attr($instance['about_content']);
        $title          = esc_attr($instance['title']);
        $showway        = esc_attr($instance['showway']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">标题:</label>
            <input type="text" size="40" value="<?php echo $title; ?>"
                   name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('about_content'); ?>">自我介绍</label>


            <textarea style="width:100%" name="<?php echo $this->get_field_name('about_content'); ?>"
                      id="<?php echo $this->get_field_id('about_content'); ?>" cols="52"
                      rows="4"><?php echo stripslashes($about_content); ?></textarea>
            <em style="padding:3px; background:#FCF3E4; border:solid 1px #F0D8BF; display:block;">上方的html代码框可以输入你的广告代码、视频代码、以及你自己编辑的html，也可以直接输入文字</em>
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
        $w_cat         = apply_filters('widget_title', empty($instance['w_cat']) ? __('') : $instance['w_cat']);
        $nnmber2       = apply_filters('widget_title', empty($instance['nnmber2']) ? __('4') : $instance['nnmber2']);
        $about_content = apply_filters('widget_title', empty($instance['about_content']) ? __('') : $instance['about_content']);
        $title         = apply_filters('widget_title', empty($instance['title']) ? __('') : $instance['title']);
        $showway       = apply_filters('widget_title', empty($instance['showway']) ? __('#') : $instance['showway']);
        $args          = array(
            'cat'       => $w_cat,
            'showposts' => $nnmber2
        );
        $query         = new WP_Query($args);
        ?>


        <div class="widget">
        
            <?php if ($title) { ?> <h2><a href="<?php echo get_category_link($w_cat); ?>"> <?php echo $title; ?></a>
            </h2> <?php } ?>
            <a class="about_pic" href="<?php echo $showway; ?>" target="_blank"><img src="<?php echo $nnmber2; ?>"
                                                                                     alt="<?php echo $title; ?>"/></a>

            <div class="code_s about_p"><?php echo html_entity_decode($about_content); ?></div>

        </div>


        </div>
        <?php
    }
}

register_widget('about_x');
?>