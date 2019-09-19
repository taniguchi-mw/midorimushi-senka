<article <?php post_class(); ?>>

  <div class="qandaList">
  <?php the_title( sprintf( '<h2 class="q"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

  <?php twentysixteen_post_thumbnail(); ?>
  <?php twentysixteen_excerpt(); ?>
  <?php if ( 'post' === get_post_type() ) : ?>
  <?php else : ?>
  <?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<footer class="entry-footer"><span class="edit-link">',
				'</span></footer><!-- .entry-footer -->'
			);
		?>
  <?php endif; ?>
  </div>
</article>
<!-- #post-## --> 

