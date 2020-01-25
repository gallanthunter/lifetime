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
    <div class="row">
        <div class="col-12">
            <section class="timeline text-secondary">
                <div class="col-12">
                    <div class="article-title font-weight-bold text-center">
                        <a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a>
                    </div>
                </div>
                <div class="col-12">
                    <?php the_content() ?>
                    <div class="timeline-item" date-is='2019-02-15'>
                        <h2>域名注册成功</h2>
                        <p>
                            成功注册域名jungedushu.com。
                        </p>
                    </div>
                    <div class="timeline-item" date-is='2019-06-05'>
                        <h2>服务器开通</h2>
                        <p>
                            在阿里云购买服务器，并开通服务，部署wordpress程序。
                        </p>
                    </div>
                    <div class="timeline-item" date-is='2019-06-06'>
                        <h2>网站备案成功</h2>
                        <p>
                            网站在工信部备案申请审核通过，备案号：粤ICP备19061878号。
                        </p>
                    </div>
                    <div class="timeline-item" date-is='2019-08-06'>
                        <h2>爱阅读正式上线</h2>
                        <p>
                            完全自己开发设计的网站--爱阅读，上线了。虽然很多功能还没完善，但是可以使用了，全部的代码在github上载了。
                            仓库地址：https://github.com/gallanthunter/lifetime
                        </p>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
