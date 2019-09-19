<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qa">
  
    <h2 class="maintt"> <?php echo root_single_cat('title'); ?> </h2>
      
    <h3 class="tts"><?php echo parent_single_cat('title'); ?></h3>
    <h4><?php the_title(); ?></h4>
    <?php the_content(); ?>
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
