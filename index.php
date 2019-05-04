<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:18
 */
?>
<?php get_header(); ?>


<div class="container p-0">
    <div class="row">
        <div class="col-xl-12">
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="#">分类</a></li>
                <li class="am-active">内容</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <?php //get_template_part('template-parts/content/content','sticky');?>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-9">
            <section class="article-list">
                <?php
                $sticky = get_option('sticky_posts');
                $paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts  = array('paged' => $paged, 'post_status' => 'publish', 'post__not_in' => $sticky,);
                query_posts($posts);
                while (have_posts()): the_post();
                    // $category = get_the_category($post->ID);
                    get_template_part('template-parts/content/content');
                endwhile;
                wp_reset_query(); ?>
            </section>
        </div>
        <div class="col-xl-3">
            <section class="sidebar">
                <?php get_template_part('sidebar'); ?>
            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>


