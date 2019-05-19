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
            'description' => '主题自带全站热门文章小工具',
            'classname'   => 'widget_hot_news'
        );
        parent::WP_Widget(false, $name = '全站热门文章', $widget_ops);
        
    }
    
    function form($instance)
    { // 给小工具(widget) 添加表单内容
        $title   = esc_attr($instance['title']);
        $limit   = esc_attr($instance['limit']);
        $content = esc_attr($instance['content']);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">标题:</label>
            <input style="width: 100%" type="text" value="<?php echo $title; ?>"
                   name="<?php echo $this->get_field_name('title'); ?>"
                   id="<?php echo $this->get_field_id('title'); ?>"/>
        </p>
        
        
        <?php
    }
    
    function update($new_instance, $old_instance)
    { // 更新保存
        return $new_instance;
    }
    
    function widget($args, $instance)
    { // 输出显示在前台页面上
        extract($args);
        // 标题
        $title = apply_filters('widget_title', empty($instance['title']) ? __('如果没有填写，我就默认显示啦') : $instance['title']);
        // 描述
        $content = apply_filters('widget_title', empty($instance['content']) ? __('如果没有填写，我就默认显示啦') : $instance['content']);
        
    }
}

register_widget('Hotnews');
?>