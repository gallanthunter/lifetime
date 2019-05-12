<?php
/**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/11 22:08
 */
?>

<?php $category = get_the_category($post->ID); ?>

<article>
    <div class="row">
        <div class="col-xl-12">
            <div class="article-title font-weight-bold text-center">
                <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
            </div>
        </div>

        <div class="col-xl-12 text-secondary text-center">
            <?php get_template_part('template-parts/content/content', 'meta'); ?>
        </div>
        <div class="col-xl-12">
            <hr>
        </div>
        <div class="col-xl-12">
            <div class="lead article-excerpt text-secondary">
                <span class="article-excerpt-title">摘要</span>
                <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?></p>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="article-content">
                <p><?php the_content() ?></p>
            </div>
        </div>

        <div class="col-xl-12 next_post">
            <p><?php if (get_next_post()) {
                    next_post_link('上一篇: %link', '%title', true);
                } ?></p>
            <p><?php if (get_previous_post()) {
                    previous_post_link('下一篇: %link', '%title', true);
                } ?> </p>
        </div>


    </div>
</article>
