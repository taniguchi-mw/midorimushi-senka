<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>">
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="viewport" content="target-densitydpi=device-dpi, width=980, maximum-scale=1.0, user-scalable=yes">
<link rel="shortcut icon" href="<?php echo home_url('/'); ?>img/favicon.ico" />
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
<div id="wrapper">
<div id="header" class="clearfix">
  <h1>
    <?php if ( is_single() ) : ?>
    <?php the_title(); ?>
    <?php elseif ( is_category() ) : ?>
    <?php single_cat_title(); ?>
    <?php endif; ?></h1>
  <div id="logo"><a href="<?php echo home_url( '/' ); ?>" class="over"><img src="<?php echo home_url( '/' ); ?>img/cmn/logo.jpg" alt="ミドリムシエメラルド公式ショッピングサイトミドリムシ専科" /></a></div>
  <div id="oparating"><img src="<?php echo home_url( '/' ); ?>img/cmn/oparating_company.gif" alt="運営会社　ユーコネクト"></div>
  <div id="h_euglena_midorimushi"><img src="<?php echo home_url( '/' ); ?>img/cmn/h_ym.gif" alt="ユーグレナ・ミドリムシ"></div>
  <div id="mainNavi">
    <ul>
      <li><a href="<?php echo home_url( '/' ); ?>">トップページ</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>midorimushi">ミドリムシって何？</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>emerald">ミドリムシエメラルド</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>teikibin">便利でお得な定期便発送</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>order">商品一覧</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>qa">よくある質問</a></li>
      <li><a href="<?php echo home_url( '/' ); ?>flow">ご注文方法</a></li>
    </ul>
  </div>
  <div id="h_service"><img src="<?php echo home_url( '/' ); ?>img/cmn/h_service.gif" alt="当店でお買い物をされると･･･全国送料無料、代引手数料無料、最短発送当日、ネット注文でポイント還元" /></div>
  <div id="subNavi">
    <ul>
      <li><a href="<?php echo home_url( '/' ); ?>order" class="over"><img src="<?php echo home_url( '/' ); ?>img/cmn/subnv01.jpg" alt="ネットご注文" /></a></li>
      <li><a href="<?php echo home_url( '/' ); ?>flow" class="over"><img src="<?php echo home_url( '/' ); ?>img/cmn/subnv02.jpg" alt="FAXでのご注文" /></a></li>
      <li><a href="https://u-connect.jp/account/my_page_login" target="_blank" class="over"><img src="<?php echo home_url( '/' ); ?>img/cmn/subnv03.jpg" alt="ログイン" /></a></li>
    </ul>
  </div>
  <div id="h_tel">
    <ul>
      <li><img src="<?php echo home_url( '/' ); ?>img/cmn/tel01.gif" alt="当日ご注文：9時半～17時(土日祝日休み)" /></li>
      <li><img src="<?php echo home_url( '/' ); ?>img/cmn/tel02.jpg" alt="0120-799-100" /></li>
      <li><img src="<?php echo home_url( '/' ); ?>img/cmn/tel03.gif" alt="ミドリムシ専科運営会社 ユーコネクト" /></li>
    </ul>
  </div>
  <?php include(dirname(__FILE__) . "/parts/sns.php"); ?>
  <!-- / #header --> 
</div>
  <div id="headBnr">
  	<a href="<?php echo home_url( '/' ); ?>news/index20190927.html"><img src="<?php echo home_url( '/' ); ?>img/campaign/bnr_cashless.png" alt="キャッシュレス・消費者還元事業の対象店です" /></a>
  </div>
<div class="breadcrumbs" vocab="https://schema.org/" typeof="BreadcrumbList">
  <?php if(function_exists('bcn_display')){ bcn_display(); }?>
  <!-- //breadcrumb  --> 
</div>
