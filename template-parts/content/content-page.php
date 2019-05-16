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
            <div class="article-title font-weight-bold text-center">
                <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
            </div>
        </div>
        <div class="col-xl-12 article-meta text-secondary text-center">
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
            <hr>
        </div>
        <div class="col-xl-12">
            <div class="article-content text-secondary">
                <p><?php the_content() ?></p>
            </div>
        </div>
    </div>
</article>