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
        <!--        cut-off rule -->
        <div class="row">
            <hr>
        </div>
        <!--        abstract -->
        <div class="row">
            <!-- 摘要 -->
            <div class="col-12">
                <div class="article-excerpt">
                    <p class="index_p_d">
                        <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?>
                    </p>
                </div>
            </div>
            <!-- Read more-->
            <div class="col-12">
                <a class="article-more"
                   rel="<?php echo get_option('home') . '/?p=' . $post->ID; ?>"><span>展开全部</span></a>
            </div>
            <div class="col-12">
                <div class="article-loading"></div>
            </div>
            <div class="col-12">
                <div class="article-picture">
                    
                    <?php
                    $content = get_the_content();
                    preg_match('/\[gallery.*ids=.(.*).\]/', $content, $ids);
                    $array_id = $ids;
                    if ($array_id) {
                        foreach ($array_id as $array_id) {
                            echo do_shortcode("[gallery ids=" . $array_id . "]");
                        }
                        // echo do_shortcode("[gallery ids=" . $array_id . "]");
                    } else {
                        get_thumbnail("main");
                    }
                    ?>
                </div>
            </div>
            <div class="col-12 article-moretag">
                <span class="main_tag">
                    <?php $posttags = get_the_tags();
                    if ($posttags) {
                        echo 'TAG：';
                        foreach ($posttags as $tag) {
                            echo '<a title="查看所有' . $tag->name . '" target="_blank" id="tagss" href="' . get_bloginfo('url') . '?tag=' . $tag->slug . '">' . $tag->name . '</a>';
                        }
                    } ?>
                </span>
            </div>
            <div class="clearfix"></div>
        </div>
    </li>
</article>