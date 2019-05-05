<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:18
 */
?>
<?php get_header(); ?>


<div class="container p-0">
    <!-- 面包屑导航 -->
    <div class="row">
        <div class="col-xl-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-9">
            <section class="article-list">
                <div class="row">
                    <div class="col-xl-12">
                        <?php //get_template_part('template-parts/content/content','sticky');?>
                    </div>
                </div>
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

            <!-- 分页 -->
            <div class="row">
                <div class="col-xl-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">上一页</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">下一页</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <section class="sidebar">
                <?php get_template_part('sidebar'); ?>
            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>


