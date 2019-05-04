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
            <div class="col-12">

            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-4">
                <h3>链接</h3>
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'menu_class' => 'footer-links')); ?>
            </div>

            <div class="col-4">
                <h3>联系我们</h3>
                <ul>
                    <li>电话：</li>
                    <li>Email: gallanthunter@163.com</li>
                </ul>
            </div>

            <div class="col-4">
                <h3>关注我们</h3>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12">
                <p class="footer-copyright "> &copy; 2019 - <?php echo date("Y") . ' ' . bloginfo('name') . '版权所有';
                    if ($icp !== "") {
                        echo ' | <a rel="nofollow" target="_blank" href="http://www.miitbeian.gov.cn/">' . stripslashes(get_option('mytheme_icp')) . '</a>';
                    };
                    if ($analytics !== "") {
                        echo ' |  ' . stripslashes(get_option('mytheme_analytics'));
                    }
                    ?> </p>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>
</html>
