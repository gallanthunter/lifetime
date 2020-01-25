<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:16
 */
?>
<div class="row">
  <div class="col-xl-12">
    <?php wp_reset_query();
        if (is_home() || is_front_page()) {
            dynamic_sidebar('全站侧栏');
            dynamic_sidebar('首页侧栏');
        } elseif (is_category()) {
            dynamic_sidebar('全站侧栏');
            dynamic_sidebar('分类页侧栏');
        } elseif (is_single()) {
            dynamic_sidebar('全站侧栏');
            dynamic_sidebar('文章页侧栏');
        } else {
            dynamic_sidebar('全站侧栏');
            dynamic_sidebar('其他页侧栏');
        } ?>
    </div>
</div>


