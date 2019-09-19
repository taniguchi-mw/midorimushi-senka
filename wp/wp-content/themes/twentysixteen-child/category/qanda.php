<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qanda">
    <h2 class="maintt"> <?php echo root_single_cat('title'); ?> </h2>

<?php 
$cat = get_the_category(); //カテゴリー情報(全体)
$cat_term = $cat[0];
$cat_term_parent = $cat[0] -> category_parent;
$cat_info = get_categories('child_of='.$cat_term_parent.'&orderby=order'); //子カテゴリー情報のみ

$carent_info = get_queried_object(); //現在のカテゴリー情報
$catParent = $carent_info -> parent; //親カテゴリーのID、なければ0
?>


<?php if(!$catParent): //現在最上位の親カテゴリの時出力↓ ?>
<p class="w720 mb-30">お客様からよくいただくご質問の一覧です。</p>
<div class="w700">

<?php
    foreach ($cat_info as $category){ ?>
<?php if($category -> count != 0) : ?>

<h3 class="tts"><?php echo $category -> cat_name; ?></h3>
<div class="qandaList">
  <?php query_posts('posts_per_page=-1&order=ASC&category__in='.$category->term_id);
    if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h4 class="q"><a href="<?php the_permalink() ?>">
    <?php the_title(); ?>
    </a></h4>
  <!-- <div class="a">
            <p><?php echo mb_substr(strip_tags($post-> post_content), 0, 76); ?>... <span><a href="<?php the_permalink(); ?>" class="link_readMore">続きを読む&nbsp;&gt;</a></span></p>
        </div> -->
  <?php endwhile; wp_reset_query();endif;endif; ?>
</div>
<?php }; ?>


<?php else : //現在子カテゴリの時出力↓  ?>
<p class="w720 mb-30">お客様からよくいただく<?php $parent_title = parent_single_cat('title'); echo $parent_title; ?>のご質問一覧です。</p>
<div class="w700">


<?php 
if ($cat_term -> category_count > 0): 
?>

<h3 class="tts">
  <?php $parent_title = parent_single_cat('title'); echo $parent_title; ?>
</h3>
<div class="qandaList">
  <?php 
$category_id = $cat_term -> cat_ID;
$args = array('category__and' => array($category_id));
$myposts = get_posts( $args );
foreach( $myposts as $post ) : 
?>
  <h4 class="q"><a href="<?php the_permalink() ?>">
    <?php the_title(); ?>
    </a></h4>
  <?php endforeach; ?>
  <?php endif; ?>
</div>
<?php endif; ?>


<!-- / w700 --> 
</div>  

    <div class="bn_order">
      <p class="bn_orderbtn"><a href="<?php echo home_url( '/' ); ?>order"><img src="<?php echo home_url( '/' ); ?>img/cmn/bn_orderbtn.jpg" alt="ご注文はこちらから" class="over" /></a></p>
      <p class="tax_no" title="6,500円">6,500円</p>
      <p class="tax_inc">(税込7,020円)</p>
      <p class="bn_orderfax"><a href="<?php echo home_url( '/' ); ?>flow" class="link">FAXでのご注文方法はこちら</a></p>
    </div>

  <!-- / #main --> 
  </div>
  <?php get_sidebar(); ?>
  <!-- / #contents --> 
</div>
<!-- / #wrapper -->
</div>
<?php get_footer(); ?>
