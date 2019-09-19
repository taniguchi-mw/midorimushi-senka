<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qa">
    <h2 class="maintt"> <?php echo root_single_cat('title'); ?> </h2>
    <div class="w700">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <?php 
	  $parent_cat_title = parent_single_cat('title');
	  global $parent_cat_title_before;
	  if (isset($parent_cat_title)) {
		  if ($parent_cat_title == $parent_cat_title_before){
			  $parent_cat_title = '';
		  } else {
			  echo "<h3 class=\"tts\">".$parent_cat_title."</h3>";
			  $parent_cat_title_before = $parent_cat_title;
		  }
	  }
	   ?>
      <div class="qandaList">
        <h4 class="q"> <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a> </h4>
        <div class="a">
          <p><?php echo mb_substr(strip_tags($post-> post_content), 0, 100); ?>... <span><a href="<?php the_permalink(); ?>">続きを読む</a></span></p>
        </div>
      </div>
      <?php endwhile; endif; ?>
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
