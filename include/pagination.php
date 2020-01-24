<?php
/**
 * 数字分页函数
 * @Param int $range            数字分页的宽度
 * @Return string|empty        输出分页的HTML代码
 */
function bootstrap_pagination()
{
    global $paged, $wp_query;
    $range    = 5;
    $max_page = $wp_query->max_num_pages;
    if (is_singular())
        return;
    if ($max_page == 1)
        return;
    if ($max_page > 1) {
        echo "<ul class='pagination justify-content-center'>";
        if (empty($paged)) {
            $paged = 1;
        }
        if ($paged != 1) {
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link(1) . "' title='跳转到首页'>首页</a></li>";
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link($paged - 1) . "'>上一页</a></li>";
        }
        if ($max_page > $range) {
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            } elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    echo '<li class="page-item';
                    if ($i == $paged)
                        echo ' active';
                    echo '"><a class="page-link"';
                    echo " href='" . get_pagenum_link($i) . "'";
                    echo ">$i</a></li>";
                }
            }
        } else {
            for ($i = 1; $i <= $max_page; $i++) {
                echo '<li class="page-item';
                if ($i == $paged)
                    echo ' active';
                echo '"><a class="page-link"';
                echo " href='" . get_pagenum_link($i) . "'";
                echo ">$i</a></li>";
            }
        }

        if ($paged != $max_page) {
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link($paged + 1) . "'>下一页</a></li>";
            echo '<li class="page-item"><a class="page-link"';
            echo " href='" . get_pagenum_link($max_page) . "'  title='跳转到最后一页'>尾页</a></li>";
        }
        echo '<li class="page-item disabled"><span class="page-link">共[' . $max_page . ']页</span></li>';
        echo "</ul>\n";
    }
}

?>