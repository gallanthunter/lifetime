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
            <div class="article-title font-weight-bold">
                <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
            </div>
        </div>

        <div class="col-xl-12 article-meta text-secondary">
            <div class="article-category">
                <span class="oi oi-list-rich" aria-hidden="true"></span>
                <a target="_blank"
                   href="<?php echo get_category_link($category[0]->term_id) ?>">
                    <?php echo $category[0]->name; ?>
                </a>
            </div>

            <div class="article-read-times">
                <span class="oi oi-eye" aria-hidden="true"></span>
                <?php echo get_post_views($post->ID) . " 次阅读"; ?>

            </div>

            <div class="article-author">
                <span class="oi oi-person" aria-hidden="true"></span>
                <a target="_blank"
                   href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
                    <?php echo the_author_nickname(); ?>
                </a>
            </div>
            <div class="article-publish-time">
                <span class="oi oi-clock" aria-hidden="true"></span>
                <?php echo get_the_time('Y-m-d'); ?>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="article-excerpt text-secondary">
                <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="article-content">
                <?php the_content() ?>
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
