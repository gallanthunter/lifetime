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
            <div class="article-lead text-secondary">
                <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?>
            </div>
        </div>
        <div class="col-xl-10 article-meta text-secondary">
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
        <div class="col-xl-2 article-more">
            <a href="<?php echo get_option('home') . '/?p=' . $post->ID; ?>"><span>阅读原文</span></a>
        </div>


    </div>
</article>