<?php
/* Template Name: 时间轴
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2019/5/30 22:42
 */
?>

<?php get_header(); ?>
<div class="container p-0">
  <!-- 面包屑导航 -->
  <div class="row">
    <div class="col-xl-12">
      <?php if (function_exists('get_breadcrumbs'))
        get_breadcrumbs(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <section class="timeline">
        <article>
          <div class="row">
            <div class="col-xl-12">
              <div class="article-title font-weight-bold text-center">
                <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
              </div>
            </div>
            <div class="col-xl-12">
              <?php the_content() ?>
              <div class="timeline-item" date-is='2020-01-25'>
                <h2>爱阅读样式调整</h2>
                <p>
                  看了很多站点的布局，趁过年还有点空闲时间，重新对爱阅读的布局和样式做了一个调整。整个站点还是以灰色主题为主，配色使用bootstrap提供的几种颜色进行搭配。审美不过关，先暂时用这个颜色和布局，后续再美化吧。
                </p>
              </div>
              <div class="timeline-item" date-is='2019-08-06'>
                <h2>爱阅读正式上线</h2>
                <p>
                  完全自己开发设计的网站--爱阅读，上线了。虽然很多功能还没完善，但是可以使用了，全部的代码在github上载了。
                  仓库地址：https://github.com/gallanthunter/lifetime
                </p>
              </div>
              <div class="timeline-item" date-is='2019-06-06'>
                <h2>网站备案成功</h2>
                <p>
                  网站在工信部备案申请审核通过，备案号：粤ICP备19061878号。
                </p>
              </div>
              <div class="timeline-item" date-is='2019-06-05'>
                <h2>服务器开通</h2>
                <p>
                  在阿里云购买服务器，并开通服务，部署wordpress程序。
                </p>
              </div>
              <div class="timeline-item" date-is='2019-02-15'>
                <h2>域名注册成功</h2>
                <p>
                  成功注册域名jungedushu.com。
                </p>
              </div>

            </div>
          </div>
        </article>
      </section>
    </div>
  </div>
</div>
<?php get_footer(); ?>
