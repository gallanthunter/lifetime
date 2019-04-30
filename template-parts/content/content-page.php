<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 15:52
 */
?>
<?php $category = get_the_category($post->ID); ?>
<article>
    <li>
        <div class="row">
            <!--            Title -->
            <div class="col-12">
                <a class="article-title" target="_blank" href="<?php the_permalink() ?>"> <?php the_title(); ?></a>
            </div>
        </div>
        <!--        Article info -->
        <div class="row">
            <div class="col-1"></div>
            <div class="col-3">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/list-rich.svg' ?>" alt="类别">
                <span>类别：</span>
                <a class="article-cat" target="_blank" href="<?php echo get_category_link($category[0]->term_id) ?>">
                    <?php echo $category[0]->name; ?>
                </a>
            </div>
            <div class="col-3">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/person.svg' ?>" alt="作者">
                <span>作者：</span>
                <a class="article-author" target="_blank"
                   href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
                    <?php echo the_author_nickname(); ?>
                </a>
            </div>
            <div class="col-4">
                <img src="<?php echo get_template_directory_uri() . '/images/svg/aperture.svg' ?>" alt="发表时间">
                <span>发表时间：</span>
                <?php echo get_the_time('Y-m-d H:i:s'); ?>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </li>
</article>