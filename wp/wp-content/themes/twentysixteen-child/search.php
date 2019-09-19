<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qa">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

      <p class="pt-30">※表示されない場合は、検索ワードを変えて再度お試しください。</p>
      <p><?php get_search_form(); ?></p>
      
      <p class="pt-30">解決しない場合は、お手数をお掛けしますがサイト下部のフリーダイヤルまたは<br>お問い合わせフォームよりお問い合わせいただきますようお願い申し上げます。</p>

    <div class="qandaList_btn_back"><a href="<?php echo home_url(); ?>/qa">よくある質問へ戻る</a></div>

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
