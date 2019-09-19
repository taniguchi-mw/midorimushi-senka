<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qanda">
 
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <h2 class="maintt"> <?php echo root_single_cat('title'); ?> </h2>

    <h3 class="tts"><?php echo parent_single_cat('title'); ?></h3>
    <div class="qandaList">
      <h4 class="q">
        <?php the_title(); ?>
      </h4>
      <div class="a">
        <?php the_content(); ?>
      </div>
    </div>
    <?php endwhile; else : ?>
    <div class="qandaList">
      <p>ページが見つかりません。</p>
      <p>ページが削除された、またはURL(リンク先)が誤っている可能性がございます。<br />
        ご不明な点がございましたら、お手数をお掛けしますがフリーダイヤルまたはお問い合わせフォームよりお問い合わせいただきますようお願い申し上げます。</p>
    </div>
    <div class="qandaList_btn_back"><a href="<?php echo home_url(); ?>/qa">よくある質問へ戻る</a></div>
    <?php endif; ?>


    <?php 
	$cates = get_the_category();
	$cat = $cates[0];
	if ($cat->category_count > 1): ?>
    <h4 class="qandaList_tt_ss">
      <?php $parent_title = parent_single_cat('title'); echo $parent_title; ?>のその他ご質問</h4>
    <ul class="qandaList_list">
      <?php 
//投稿が属するカテゴリのIDを$category_idとして取得
//(複数カテゴリーに属している場合は１つだけIDを取得)
$category_id=$cat->cat_ID;
//$argsでリスト表示する記事の条件設定
//属するカテゴリのIDが$category_idである全ての記事を選び
//今表示している投稿を除外
//上記条件に該当する記事を全て表示
$args = array('category__and' =>array($category_id),
'post__not_in' => array($post->ID),
'posts_per_page' =>-1);
$myposts = get_posts( $args );
foreach( $myposts as $post ) : 
?>
      <li class="q"><a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
        </a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>


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
