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
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
      </div>
    </div>
    <div class="col-xl-12 text-center">
      <?php get_template_part('template-parts/content/content', 'meta'); ?>
    </div>
    <!--        <div class="col-xl-12">-->
    <!--            <div class="article-excerpt">-->
    <!--                <span class="article-excerpt-title">摘要</span>-->
    <!--                <p>-->
    <?php //echo mb_strimwidth(strip_tags(apply_filters('the_excerpt', get_the_excerpt($post->ID))), 0, 400, "..."); ?><!--</p>-->
    <!--            </div>-->
    <!--        </div>-->

    <div class="col-xl-12">
      <div class="article-content">
        <p><?php the_content() ?></p>
      </div>
    </div>
  </div>
</article>

<div class="row">
  <!-- 显示文章标签列表-->
  <div class="col-xl-12">
    <div class="article-tags">
      <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
    </div>
  </div>
  <div class="col-xl-12 article-notice">
    <div class="alert alert-warning" role="alert">
      <h2 class="alert-heading">说明</h2>
      <hr>
      <div class="row">
        <div class="col-xl-2">
          <div id="qrcode"></div>
        </div>
        <div class="col-xl-10">
          <p>除特别注明外，本站所有文章均为原创，转载请注明出处! <?php the_permalink() ?></p>
          <p>欢迎转载~</p>
        </div>
      </div>

    </div>
  </div>
</div>
