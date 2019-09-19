<?php
//カスタム投稿タイプでない投稿
if (in_category('qanda') || root_single_cat('slug') == 'qa') {
    include(STYLESHEETPATH.'/single/qanda.php');
} else {
    include(STYLESHEETPATH.'/single/single-default.php');
}
?>
