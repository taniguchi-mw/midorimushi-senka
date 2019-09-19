<?php get_header(); ?>

<div id="contents" class="clearfix">
  <div id="main" class="qa">
      <p>ページが見つかりません。</p>
      <p>ページが削除された、またはURL(リンク先)が誤っている可能性がございます。</p>
      
      <!-- <p class="pt-30">※下記へ検索したいワードを入力し、再度検索をお試しください。</p>
      <p><?php get_search_form(); ?></p> -->
      
      <p class="pt-30"><span>解決しない場合は、</span>お手数をお掛けしますがサイト下部のフリーダイヤルまたは<br>お問い合わせフォームよりお問い合わせいただきますようお願い申し上げます。</p>

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