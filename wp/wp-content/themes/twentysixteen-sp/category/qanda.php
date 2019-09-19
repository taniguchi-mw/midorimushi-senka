<?php get_header(); ?>

<?php 
$cat = get_the_category(); //カテゴリー情報(全体)
$cat_term = $cat[0];
$cat_term_parent = $cat[0] -> category_parent;
$cat_info = get_categories('child_of='.$cat_term_parent.'&orderby=order'); //子カテゴリー情報のみ

$carent_info = get_queried_object(); //現在のカテゴリー情報
$catParent = $carent_info -> parent; //親カテゴリーのID、なければ0
?>

<article id="container" class="qa">
  <h2> <?php echo root_single_cat('title'); ?> </h2>
<?php if(!$catParent): //現在最上位の親カテゴリの時出力↓ ?>
  <nav id="mainNavi" class="btn_gray_sdw">
 <?php
    foreach ($cat_info as $category){ ?>
 	<?php if($category -> count != 0) : ?>
  	<a href="#<?php echo $category -> slug; ?>"><?php echo $category -> cat_name; ?><span class="moveu12_r">　</span></a>
 	<?php wp_reset_query();endif; ?>
 <?php }; ?>
  </nav>


<?php
    foreach ($cat_info as $category){ ?>
 <?php if($category -> count != 0) : ?>
  <section>
    <h3 id="<?php echo $category -> slug; ?>"><?php echo $category -> cat_name; ?></h3>
    <div class="box01">
      <?php query_posts('posts_per_page=-1&order=ASC&category__in='.$category->term_id);
    if (have_posts()) : while (have_posts()) : the_post(); ?>
      <p><a href="<?php the_permalink(); ?>" class="q">
        <?php the_title(); ?>
        <span class="mover12_r">　</span></a></p>
      <?php endwhile; wp_reset_query();endif;endif; ?>
    </div>
  </section>
 <?php }; ?>

  <?php else : //現在子カテゴリの時出力↓  ?>
  
  	<?php if ($cat_term -> category_count > 0): ?>
  <section>
    <h3><?php $parent_title = parent_single_cat('title'); echo $parent_title; ?></h3>
    <div class="box01">
        <?php 
			$category_id = $cat_term -> cat_ID;
			$args = array('category__and' => array($category_id));
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : ?>
        <p><a href="<?php the_permalink(); ?>" class="q"><?php the_title(); ?><span class="mover12_r">　</span></a></p>
        <?php endforeach; ?>
    <?php endif; ?>
      <p class="ta-c pt-15"><a href="<?php echo home_url('/'); ?>qa/" class="fc-blu">ご質問一覧へ戻る</a></p>
    </div>
  </section>
<?php endif; ?>


</article>
<?php get_footer(); ?>
