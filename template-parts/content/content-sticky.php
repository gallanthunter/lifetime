<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 15:39
 */
?>
    <section class="sticky_post">
    <ul>
<?php
$sticky = get_option('sticky_posts');
$paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args   = array('posts_per_page' => 4, 'paged' => $paged, 'post_status' => 'publish', 'post__in' => $sticky, 'caller_get_posts' => 1);
query_posts($args);
if ($sticky) { ?>
    <?php while (have_posts()):the_post();
        $category = get_the_category($post->ID); ?>
        <li>
            <a class="sticky_images" title=" <?php the_title(); ?>" target="_blank"
               href="<?php the_permalink() ?>">
                <?php if (get_the_excerpt($post->ID)) { ?>
                    <div class="sticky_ex">
                        <p>
                            <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp', get_the_excerpt($post->ID))), 0, 200, "..."); ?>
                        </p>
                        <div class="btn"> read more</div>
                    </div>
                <?php }
                thumbnails("case_full"); ?>
            </a>
          <strong class="sticky_title" title=" <?php the_title(); ?>"><a target="_blank"
                                                                         href="<?php the_permalink() ?>"> <?php the_title(); ?></a></strong>
          <a href="<?php echo get_category_link($category[0]->term_id) ?>" class="cat">
            <?php echo $category[0]->name; ?> /
            <?php echo $category[0]->slug; ?>
          </a>
          <div class="author">
            <a target="_blank" href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
              <?php the_author_meta('nickname'); ?>
            </a>
            写在
            <?php echo get_the_time('Y年M月D日'); ?>
          </div>
        </li>
    <?php endwhile;
    wp_reset_query(); ?>
    </ul>
    </section>
<?php }; ?>
