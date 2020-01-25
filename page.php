<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:16
 */
?>
<?php get_header(); ?>
<div class="container p-0">
    <!-- 面包屑导航 -->
    <div class="row">
        <div class="col-12">
            <?php if (function_exists('get_breadcrumbs'))
                get_breadcrumbs(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <section class="article-list">
                <div class="row no-gutters">
                    <div class="col-12">
                        <?php //get_template_part('template-parts/content/content','sticky');?>
                    </div>
                </div>
                <?php
                while (have_posts()): the_post();
                    // $category = get_the_category($post->ID);
                    get_template_part('template-parts/content/content', 'page');
                endwhile;
                wp_reset_query(); ?>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
