<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:17
 */
?>
<?php get_header(); ?>

<div class="container p-0">
  <!-- 面包屑导航 -->
  <div class="row">
    <div class="col-xl-12 p-2">
      <?php if (function_exists('get_breadcrumbs'))
                get_breadcrumbs(); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-8 p-2">
      <section class="article-list">
        <div class="row">
          <div class="col-xl-12">
            <?php //get_template_part('template-parts/content/content','sticky');?>
                    </div>
                </div>
                <?php
                while (have_posts()): the_post();
                    get_template_part('template-parts/content/content', 'list');
                endwhile;
                wp_reset_query(); ?>
            </section>

            <!-- 分页 -->
            <?php get_template_part('template-parts/content/content', 'pagination'); ?>
    </div>
    <div class="col-xl-4 p-2">
      <section class="sidebar">
        <?php get_template_part('sidebar'); ?>

            </section>
        </div>
    </div>
</div>


<?php get_footer(); ?>
