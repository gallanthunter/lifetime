<?php
/**
 * Description:
 * Author: Zhang Zhijun
 * Date: 2019/3/23 12:21
 */
?>

<?php
if (is_home()) {
    bloginfo('name');
    echo ' - ';
    bloginfo('description');
} else {
    bloginfo('name');
}
if ($paged > 1) {
    echo ' - page ' . $paged;
    echo ' - ';
    bloginfo('description');
}
?>
