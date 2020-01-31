<?php
/**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/12 18:32
 */
?>
<?php $category = get_the_category($post->ID); ?>
<div class="article-meta">
  <div class="article-category">
    <span class="oi oi-list-rich" aria-hidden="true"></span>
    <a href="<?php echo get_category_link($category[0]->term_id) ?>">
      <?php echo $category[0]->name; ?>
    </a>
  </div>

  <div class="article-author">
    <span class="oi oi-person" aria-hidden="true"></span>
    <a href="<?php echo get_author_posts_url(get_the_author_ID()); ?>">
      <?php echo the_author_meta(nickname); ?>
    </a>
  </div>

  <div class="article-read-times">
    <span class="oi oi-eye" aria-hidden="true"></span>
    <?php echo get_post_views($post->ID) . " 次阅读"; ?>

  </div>

  <div class="article-publish-time">
        <span class="oi oi-clock" aria-hidden="true"></span>
        <?php echo get_the_time('Y-m-d'); ?>
    </div>
</div>
