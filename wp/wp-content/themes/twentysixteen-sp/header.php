<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-script-type" content="<?php bloginfo('charset'); ?>">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no" />
<meta name="robots" content="noindex,follow">
<title>よくいただくご質問</title>
<link rel="canonical" href="<?php echo home_url('/'); ?>qa/">
<link rel="apple-touch-icon" href="<?php echo home_url('/'); ?>sp/img/webclip.png" />
<?php if ( is_single() ) : ?>
<?php
$custom_fields = get_post_custom();
//meta descriptionの設定
if(isset($custom_fields['description'])){
    $description = $custom_fields['description'];
} else { $description = ''; }
if($description != null) {
    echo '<meta name="description" content="'.get_post_meta($post->ID,'description',true).'" />';
}
?>
<?php elseif ( is_category() ) : ?>
<?php
$category_description = category_description();
if(isset($category_description)){
    echo '<meta name="description" content="'.$category_description.'" />';
}
?>
<?php endif; ?>
<?php include(dirname(__FILE__) . "/parts/tracking.php"); ?>
<?php wp_head(); ?>
</head>
<body>
<a id="top"></a>
<header id="gHeader">
  <h1>よくいただくご質問</h1>
  <p id="logo"><a href="<?php echo home_url( '/' ); ?>sp/"><img src="<?php echo home_url( '/' ); ?>sp/img/cmn/logo.png" alt="ミドリムシ専科スマホサイト"></a></p>
  <p class="btn_login"><a href="https://u-connect.jp/account/my_page_login" target="_blank" class="btn_grn_r"><img src="<?php echo home_url( '/' ); ?>sp/img/cmn/login26.png" alt="マイアカウントページログイン"></a></p>
</header>
<nav>
  <div id="subNavi" class="btn_gray_sdw"><a href="<?php echo home_url( '/' ); ?>sp/" class="btn_gray_s subNavi_col1"><img src="<?php echo home_url( '/' ); ?>sp/img/cmn/home26.png">HOMEへ戻る</a><!-- <a href="javascript:history.back()" class="btn_gray_s"><img src="<?php echo home_url( '/' ); ?>sp/img/cmn/back26.png">前へ戻る</a> --><a href="<?php echo home_url( '/' ); ?>sp/order/" class="btn_gray_s subNavi_col1"><img src="<?php echo home_url( '/' ); ?>sp/img/cmn/cart26.png">商品一覧</a></div>
</nav>
<div id="headBnr">
  <a href="<?php echo home_url( '/' ); ?>sp/news/n20190927.html"><img src="<?php echo home_url( '/' ); ?>img/campaign/bnr_cashless.png" alt="キャッシュレス・消費者還元事業の対象店です" /></a>
</div>
