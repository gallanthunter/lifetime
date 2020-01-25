<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 15:52
 */
?>
<?php $category = get_the_category($post->ID); ?>

<article class="card">
    <div class="row card-body">
        <div class="col-12">
            <div class="article-title font-weight-bold">
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
            </div>
        </div>
        <div class="col-12">
            <div class="article-excerpt text-body article-excerpt-no-border">
                <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 200, "..."); ?>
            </div>
        </div>
        <div class="col-10">
            <?php get_template_part('template-parts/content/content', 'meta'); ?>
        </div>
        <div class="col-2 article-more">
            <a class="btn btn-primary btn-sm" href="<?php echo get_option('home') . '/?p=' . $post->ID; ?>"
               role="button">阅读原文</a>
        </div>
    </div>
</article>