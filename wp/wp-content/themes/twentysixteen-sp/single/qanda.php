<?php get_header(); ?>

<article id="container" class="qa">
  <h2> <?php echo root_single_cat('title'); ?> </h2>
  <section>
  	<h3><?php echo parent_single_cat('title'); ?></h3>
	<div class="box01">

 
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
      <h4 class="q"><?php the_title(); ?></h4>
      <div class="a"><?php the_content(); ?></div>
      <p class="ta-c"><a href="<?php echo home_url('/'); ?>qa/" class="fc-blu">ご質問一覧へ戻る</a></p>

    <?php endwhile; else : ?>
      <p>ページが見つかりません。</p>
      <p>ページが削除された、またはURL(リンク先)が誤っている可能性がございます。<br />
        ご不明な点がございましたら、お手数をお掛けしますがフリーダイヤルまたはお問い合わせフォームよりお問い合わせいただきますようお願い申し上げます。</p>
      <p class="ta-c pt-15"><a href="<?php echo home_url('/'); ?>qa/" class="fc-blu">ご質問一覧へ戻る</a></p>
    <?php endif; ?>

	</div>
  </section>


    <?php 
	$cates = get_the_category();
	$cat = $cates[0];
	if ($cat->category_count > 1): ?>

  <section>
  	<h3><?php $parent_title = parent_single_cat('title'); echo $parent_title; ?>のその他ご質問</h3>
	<div class="box01">
      <?php $category_id=$cat->cat_ID;
	  $args = array('category__and' =>array($category_id),
	  'post__not_in' => array($post->ID),
	  'posts_per_page' =>-1);
	  $myposts = get_posts( $args );
	  foreach( $myposts as $post ) : ?>

      <p><a href="<?php the_permalink(); ?>" class="q"><?php the_title(); ?></a></p>

      <?php endforeach; ?>

      <p class="ta-c pt-15"><a href="<?php echo home_url('/'); ?>qa/" class="fc-blu">ご質問一覧へ戻る</a></p>
    </div>
    <?php endif; ?>
  </section>


</article>
<?php get_footer(); ?>
