<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:14
 */
?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 footer-links">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'items_wrap' => '<ul class="footer-menu-items">%3$s</ul>')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 footer-copyright">
                <p>
                    Copyright &copy; 2019 - <?php echo date("Y") ?> <?php echo ' ' . bloginfo('name') . ' 版权所有'; ?>
                    <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">ICP-123456789</a>
                    百度统计
                </p>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>

<script src="<?php echo get_template_directory_uri() . '/js/vendor/modernizr-3.7.1.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/vendor/jquery-3.4.0.min.js' ?>"></script>

<script src="<?php echo get_template_directory_uri() . '/js/vendor/bootstrap.min.js' ?>"></script>


<script src="<?php echo get_template_directory_uri() . '/js/plugins.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/main.js' ?>"></script>
</body>
</html>
