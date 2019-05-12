<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 15:52
 */
?>
<?php $category = get_the_category($post->ID); ?>

<article>
    <div class="row">
        <div class="col-xl-12">
            <div class="article-title font-weight-bold">
                <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="article-excerpt text-secondary article-excerpt-no-border">
                <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?>
            </div>
        </div>
        <div class="col-xl-10 text-secondary">
            <?php get_template_part('template-parts/content/content', 'meta'); ?>
        </div>
        <div class="col-xl-2 article-more">
            <a href="<?php echo get_option('home') . '/?p=' . $post->ID; ?>"><span>阅读原文</span></a>
        </div>


    </div>
</article>