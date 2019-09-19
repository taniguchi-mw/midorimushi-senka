<?php
//カスタム投稿タイプでない投稿
if (in_category('qanda') || root_single_cat('slug') == 'qa') {
    include(STYLESHEETPATH.'/category/qanda.php');
//} elseif(in_category('media') || root_single_cat('slug') == 'media') {
//    include(STYLESHEETPATH.'/category/media.php');
//} elseif(in_category('news') || root_single_cat('slug') == 'news') {
//    include(STYLESHEETPATH.'/category/news.php');
} else {
	include(STYLESHEETPATH.'/category-default.php');
}
?>
