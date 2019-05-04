<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:18
 */
?>
<?php get_header(); ?>


<div class="am-g am-g-fixed am-g-collapse">
    <div class="am-u-lg-12">
        <ol class="am-breadcrumb">
            <li><a href="#" class="am-icon-home">首页</a></li>
            <li><a href="#">分类</a></li>
            <li class="am-active">内容</li>
        </ol>
    </div>

    <div class="am-u-sm-12 am-u-md-8 am-u-lg-8">
        <div class="article-list">
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
        </div>
    </div>
    <div class="am-u-sm-12 am-u-md-4 am-u-lg-4">
        <?php get_template_part('sidebar'); ?>
    </div>
</div>


<?php get_footer(); ?>


