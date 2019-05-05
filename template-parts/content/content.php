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
            <div class="article-title">
                <h1><a href="<?php the_permalink() ?>" target="_blank"> <?php the_title(); ?></a></h1>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="article-lead">
                <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?>
            </div>
        </div>
        <div class="col-xl-10 article-meta">
            <div class="article-category">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/list-rich.svg' ?>" alt="类别">
                <a class="article-cat" target="_blank"
                   href="<?php echo get_category_link($category[0]->term_id) ?>">
                    <?php echo $category[0]->name; ?>
                </a>
            </div>

            <div class="article-author">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/person.svg' ?>" alt="作者">
                <a class="article-author" target="_blank"
                   href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
                    <?php echo the_author_nickname(); ?>
                </a>
            </div>
            <div class="article-publish-time">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/aperture.svg' ?>" alt="发表时间">
                <?php echo get_the_time('Y-m-d'); ?>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="article-more">
                <a href="<?php echo get_option('home') . '/?p=' . $post->ID; ?>"><span>阅读原文</span></a>
            </div>
        </div>


    </div>
</article>