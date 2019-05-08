<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:17
 */
?>
<?php get_header(); ?>
<div class="container p-0">
    <!-- 面包屑导航 -->
    <div class="row">
        <div class="col-xl-12">
            <?php if (function_exists('get_breadcrumbs'))
                get_breadcrumbs(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
