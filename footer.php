<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/4/29 22:14
 */
?>

<script src="<?php echo get_template_directory_uri() . '/js/vendor/modernizr-3.7.1.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/vendor/jquery-3.4.0.min.js' ?>"></script>

<script src="<?php echo get_template_directory_uri() . '/js/vendor/bootstrap.min.js' ?>"></script>


<script src="<?php echo get_template_directory_uri() . '/js/plugins.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/js/main.js' ?>"></script>
<footer>
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-4 footer-links">
                <h3>链接</h3>
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-links')); ?>
            </div>

            <div class="col-8 footer-contact-us">
                <div class="footer-contact-info">
                    <h3>联系我们</h3>
                    <ul>
                        <li>电话：</li>
                        <li>Email: gallanthunter@163.com</li>
                    </ul>
                </div>
                <div class="footer-social-account">

                </div>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12">
                <p class="footer-copyright ">
                    &copy; 2019 - <?php echo date("Y") . ' ' . bloginfo('name') . '版权所有'; ?>
                    <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">ICP-123456789</a>
                    百度统计
                </p>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
