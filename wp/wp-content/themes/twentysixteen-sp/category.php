<?php
//カスタム投稿タイプでない投稿
if (in_category('qanda') || root_single_cat('slug') == 'qa') {
    include(STYLESHEETPATH.'/category/qanda.php');
} else {
	include(STYLESHEETPATH.'/category/category-default.php');
}
?>
