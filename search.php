<?php
/**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/28 22:12
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
        <div class="col-9">
            <section class="article-list">
                <?php
                if (have_posts()) :
                    while (have_posts()): the_post();
                        get_template_part('template-parts/content/content', 'list');
                    endwhile;
                    wp_reset_query();
                else:
                    echo '<h5 class="text-center text-secondary"> 未找到任何内容! </h5>';
                endif;
                ?>
            </section>

            <!-- 分页 -->
            <?php get_template_part('template-parts/content/content', 'pagination'); ?>
        </div>
        <div class="col-3">
            <section class="sidebar">
                <?php get_template_part('sidebar'); ?>

            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>
