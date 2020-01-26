<?php /**
 * 功能:
 * 参数：
 * 作者: Zhang Zhijun
 * 日期: 2020/1/26 11:54
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
      <section class="about">
        <!-- Bottom to top -->
        <div class="row">
          <div class="col-xl-6">

            <!-- colored -->
            <div class="ih-item circle colored effect17"><a href="#">
                <div class="img"><img src="images/assets/5.jpg" alt="img"></div>
                <div class="info">
                  <h3>我是谁</h3>
                  <p>Description goes here</p>
                </div>
              </a></div>
            <!-- end colored -->

          </div>
          <div class="col-xl-6">
            <h3>我是谁</h3>
            <p>

            </p>

          </div>
        </div>
        <!-- end Bottom to top -->
      </section>
    </div>
  </div>
</div>
<?php get_footer(); ?>
