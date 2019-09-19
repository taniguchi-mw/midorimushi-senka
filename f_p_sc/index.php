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
      <h2 class="lead">アラーム付きサプリメントケース<br>ご希望の方に無料プレゼント！<br>
      <small>※お一人様１個まで</small></h2>
      <p>下記「３箇所」へご入力ください。送信ボタンを押してお申し込み完了です。</p>
    </div>
    <form class="form-horizontal" method="POST" name="fm16scp" action="thankyou.php">
      <input name="scroll" type="hidden">
<?
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {

	if(is_array($varvalue)){

		for($i=0;$i<sizeof($varvalue);$i++){
		$varvalue2.=$varvalue[$i];
		if($varvalue[$i]!="" and $varvalue[($i+1)]!=""){ $varvalue2.="---"; }
		}
		
		$varvalue=htmlspecialchars(strip_tags($varvalue2));
		$varvalue2="";
	}
	
	$$varname=$varvalue;
	
	if($_POST['soushin_x']!=""){
	//hidden
	if($varname!="scroll" and $varname!="submit" and $varname!="soushin_x"){
	echo "<input type=\"hidden\" name=\"".htmlspecialchars($varname)."\" value=\"".htmlspecialchars($varvalue)."\">\n";
	}
	}
}
?>

      <div class="form-group">
        <label class="col-sm-3 control-label">お名前 <span class="label label-danger">必須</span></label>
        <div class="col-sm-9">
          <input type="text" name="name" autocomplete="name" class="form-control" placeholder="お名前" value="<?php echo htmlspecialchars($_POST['name']); ?>" required/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">電話番号 <span class="label label-danger">必須</span></label>
        <div class="col-sm-9">
          <input type="tel" name="tel" autocomplete="tel" class="form-control" placeholder="電話番号" value="<?php echo htmlspecialchars($_POST['tel']); ?>"required/>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">都道府県 <span class="label label-danger">必須</span></label>
        <div class="col-sm-9">
          <select name="address" autocomplete="address" class="form-control" required>
            <option value="" selected>ご選択ください</option>
            <option value="北海道"<?php if(htmlspecialchars($_POST['address'])=="北海道"){ echo " selected"; } ?>>北海道</option>
            <option value="青森県"<?php if(htmlspecialchars($_POST['address'])=="青森県"){ echo " selected"; } ?>>青森県</option>
            <option value="岩手県"<?php if(htmlspecialchars($_POST['address'])=="岩手県"){ echo " selected"; } ?>>岩手県</option>
            <option value="宮城県"<?php if(htmlspecialchars($_POST['address'])=="宮城県"){ echo " selected"; } ?>>宮城県</option>
            <option value="秋田県"<?php if(htmlspecialchars($_POST['address'])=="秋田県"){ echo " selected"; } ?>>秋田県</option>
            <option value="山形県"<?php if(htmlspecialchars($_POST['address'])=="山形県"){ echo " selected"; } ?>>山形県</option>
            <option value="福島県"<?php if(htmlspecialchars($_POST['address'])=="福島県"){ echo " selected"; } ?>>福島県</option>
            <option value="茨城県"<?php if(htmlspecialchars($_POST['address'])=="茨城県"){ echo " selected"; } ?>>茨城県</option>
            <option value="栃木県"<?php if(htmlspecialchars($_POST['address'])=="栃木県"){ echo " selected"; } ?>>栃木県</option>
            <option value="群馬県"<?php if(htmlspecialchars($_POST['address'])=="群馬県"){ echo " selected"; } ?>>群馬県</option>
            <option value="埼玉県"<?php if(htmlspecialchars($_POST['address'])=="埼玉県"){ echo " selected"; } ?>>埼玉県</option>
            <option value="千葉県"<?php if(htmlspecialchars($_POST['address'])=="千葉県"){ echo " selected"; } ?>>千葉県</option>
            <option value="東京都"<?php if(htmlspecialchars($_POST['address'])=="東京都"){ echo " selected"; } ?>>東京都</option>
            <option value="神奈川県"<?php if(htmlspecialchars($_POST['address'])=="神奈川県"){ echo " selected"; } ?>>神奈川県</option>
            <option value="新潟県"<?php if(htmlspecialchars($_POST['address'])=="新潟県"){ echo " selected"; } ?>>新潟県</option>
            <option value="富山県"<?php if(htmlspecialchars($_POST['address'])=="富山県"){ echo " selected"; } ?>>富山県</option>
            <option value="石川県"<?php if(htmlspecialchars($_POST['address'])=="石川県"){ echo " selected"; } ?>>石川県</option>
            <option value="福井県"<?php if(htmlspecialchars($_POST['address'])=="福井県"){ echo " selected"; } ?>>福井県</option>
            <option value="山梨県"<?php if(htmlspecialchars($_POST['address'])=="山梨県"){ echo " selected"; } ?>>山梨県</option>
            <option value="長野県"<?php if(htmlspecialchars($_POST['address'])=="長野県"){ echo " selected"; } ?>>長野県</option>
            <option value="岐阜県"<?php if(htmlspecialchars($_POST['address'])=="岐阜県"){ echo " selected"; } ?>>岐阜県</option>
            <option value="静岡県"<?php if(htmlspecialchars($_POST['address'])=="静岡県"){ echo " selected"; } ?>>静岡県</option>
            <option value="愛知県"<?php if(htmlspecialchars($_POST['address'])=="愛知県"){ echo " selected"; } ?>>愛知県</option>
            <option value="三重県"<?php if(htmlspecialchars($_POST['address'])=="三重県"){ echo " selected"; } ?>>三重県</option>
            <option value="滋賀県"<?php if(htmlspecialchars($_POST['address'])=="滋賀県"){ echo " selected"; } ?>>滋賀県</option>
            <option value="京都府"<?php if(htmlspecialchars($_POST['address'])=="京都府"){ echo " selected"; } ?>>京都府</option>
            <option value="大阪府"<?php if(htmlspecialchars($_POST['address'])=="大阪府"){ echo " selected"; } ?>>大阪府</option>
            <option value="兵庫県"<?php if(htmlspecialchars($_POST['address'])=="兵庫県"){ echo " selected"; } ?>>兵庫県</option>
            <option value="奈良県"<?php if(htmlspecialchars($_POST['address'])=="奈良県"){ echo " selected"; } ?>>奈良県</option>
            <option value="和歌山県"<?php if(htmlspecialchars($_POST['address'])=="和歌山県"){ echo " selected"; } ?>>和歌山県</option>
            <option value="鳥取県"<?php if(htmlspecialchars($_POST['address'])=="鳥取県"){ echo " selected"; } ?>>鳥取県</option>
            <option value="島根県"<?php if(htmlspecialchars($_POST['address'])=="島根県"){ echo " selected"; } ?>>島根県</option>
            <option value="岡山県"<?php if(htmlspecialchars($_POST['address'])=="岡山県"){ echo " selected"; } ?>>岡山県</option>
            <option value="広島県"<?php if(htmlspecialchars($_POST['address'])=="広島県"){ echo " selected"; } ?>>広島県</option>
            <option value="山口県"<?php if(htmlspecialchars($_POST['address'])=="山口県"){ echo " selected"; } ?>>山口県</option>
            <option value="徳島県"<?php if(htmlspecialchars($_POST['address'])=="徳島県"){ echo " selected"; } ?>>徳島県</option>
            <option value="香川県"<?php if(htmlspecialchars($_POST['address'])=="香川県"){ echo " selected"; } ?>>香川県</option>
            <option value="愛媛県"<?php if(htmlspecialchars($_POST['address'])=="愛媛県"){ echo " selected"; } ?>>愛媛県</option>
            <option value="高知県"<?php if(htmlspecialchars($_POST['address'])=="高知県"){ echo " selected"; } ?>>高知県</option>
            <option value="福岡県"<?php if(htmlspecialchars($_POST['address'])=="福岡県"){ echo " selected"; } ?>>福岡県</option>
            <option value="佐賀県"<?php if(htmlspecialchars($_POST['address'])=="佐賀県"){ echo " selected"; } ?>>佐賀県</option>
            <option value="長崎県"<?php if(htmlspecialchars($_POST['address'])=="長崎県"){ echo " selected"; } ?>>長崎県</option>
            <option value="熊本県"<?php if(htmlspecialchars($_POST['address'])=="熊本県"){ echo " selected"; } ?>>熊本県</option>
            <option value="大分県"<?php if(htmlspecialchars($_POST['address'])=="大分県"){ echo " selected"; } ?>>大分県</option>
            <option value="宮崎県"<?php if(htmlspecialchars($_POST['address'])=="宮崎県"){ echo " selected"; } ?>>宮崎県</option>
            <option value="鹿児島県"<?php if(htmlspecialchars($_POST['address'])=="鹿児島県"){ echo " selected"; } ?>>鹿児島県</option>
            <option value="沖縄県"<?php if(htmlspecialchars($_POST['address'])=="沖縄県"){ echo " selected"; } ?>>沖縄県</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="center-block text-center">
          <input type="submit" name="soushin_x" value="送信する" class="btn btn-green btn-xxl">
        </div>
      </div>
    </form>
  </div>
</div>
  <div id="footer" class="container">
  <p>※送信はSSL通信で暗号化されます。</p>
  <address>Copyright © 株式会社ユーコネクト All Rights Reserved.</address>
</div>
</body>
</html>