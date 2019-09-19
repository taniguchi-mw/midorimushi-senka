<?
error_reporting(0);
$HTTP_POST_VARS = &$_POST;
//設定ファイル読み込み
include("inc.php");

//POSTデータ読み込み
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {
$$varname=htmlspecialchars(strip_tags($varvalue));
}

//送信画面
if($_POST['soushin_x']!=""){

	
	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//ユーコネクト担当者へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=$send;
	
	$subject="【お申し込み受付】アラーム付きサプリメントケースプレゼント";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body="お申し込み内容は以下の通りです。(ID:ＣＭ４)\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="■お名前：\n".$name."\n\n";
	$body.="■電話番号：\n".$tel."\n\n";
	$body.="■都道府県：\n".$address."\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";

	$body=mb_convert_encoding($body,"JIS","utf-8");

	/* ヘッダ */
	//$headers="From: ".$mail."\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
	$headers.="Content-Transfer-Encoding: 7bit\n";
	$headers=mb_convert_encoding($headers,"JIS","utf-8");
	
	mail($sendoto,$subject,$body,$headers);

	//header("Location: thankyou.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8"/>
  <meta name="robots" content="noindex,nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes"/>
<!-- bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <!-- <script>
    window.addEventListener("beforeunload", function (event) {
      var confirmationMessage = "入力内容を破棄します。";

      event.returnValue = confirmationMessage;
      return confirmationMessage;
    });
  </script> -->
<!-- //bootstrap -->
  <link rel="stylesheet" href="./css/style.css">
<!-- Google Tag Manager -->
<noscript>
<iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQX928"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQX928');</script> 
<!-- End Google Tag Manager -->
  </head>
  <body>
<div id="wrap">
  <div class="container">
    <div class="page-header">
      <h1><img src="images/form_logo.png" alt="ロゴ"></h1>
    </div>
    <div class="page_title">
      <h2 class="lead">プレゼントのお申し込みを承りました</h2>
      <p>この度は「アラーム付きサプリメントケースプレゼント」へお申し込みいただき誠にありがとうございます。</p>
      <p class="text-danger">※プレゼントは、お申し込みから5営業日以降の定期発送へ同梱してお届け致します。</p>
    </div>
    <div class="precautions">
    <h4>※キャンペーンに関する諸注意</h4>
      <p>
       ・自動返信メールは送られませんので、下記お申し込み内容をもう一度ご確認ください。<br>
        ・お申し込み〆切は2017/5/7までです。在庫限りのため、期限を過ぎるとお渡しできない可能性がございますのでご了承ください。<br>
        ・プレゼントのお届けはお一人様１個までです。<br>
・5営業日経過後の定期に同梱されていなかった場合は、お手数をお掛けしますがご連絡いただきますようお願い申し上げます。</p>
    </div>
    <div class="infomation">
      <h3>お申し込み内容</h3>
      <p>お名前：<?php echo htmlspecialchars($name); ?>様<br>
        お電話番号：<?php echo htmlspecialchars($tel); ?><br>
        都道府県：<?php echo htmlspecialchars($address); ?></p>
    </div>
    <!-- <div class="form-group">
        <div class="center-block text-center">
        <a href="javascript:window.close();" class="btn btn-lblue btn-xxl">
        閉じる
        </a>
        <input type="button" class="btn btn-lblue btn-xxl" value="閉じる" onClick="if (/Chrome/i.test(navigator.userAgent)) { window.close(); } else { window.open('about:blank', '_self').close(); }">
        </div>
      </div> -->
  </div>
</div>
  <div id="footer" class="container">
  <p>※送信はSSL通信で暗号化されます。</p>
  <address>Copyright © 株式会社ユーコネクト All Rights Reserved.</address>
</div>
</body>
</html>