<?php
//error_reporting(0);
$HTTP_POST_VARS = &$_POST;
//設定ファイル読み込み
include("inc.php");

//POSTデータ読み込み
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {
$$varname=$varvalue;
}

//メールアドレス書式チェック
function valid_mail($mail)
{
if(preg_match('/^(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|"[^\\\\\x80-\xff\n\015"]*(?:\\\\[^\x80-\xff][^\\\\\x80-\xff\n\015"]*)*")(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|"[^\\\\\x80-\xff\n\015"]*(?:\\\\[^\x80-\xff][^\\\\\x80-\xff\n\015"]*)*"))*@(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[^\x80-\xff])*\])(?:\.(?:[^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff]+(?![^(\040)<>@,;:".\\\\\[\]\000-\037\x80-\xff])|\[(?:[^\\\\\x80-\xff\n\015\[\]]|\\\\[^\x80-\xff])*\]))*$/', $mail)) return 1;
}

//エラーチェック

if($_POST[name]==""){ $er.="■お名前が入力されていません。<br>"; }
if($_POST[kana]==""){ $er.="■ふりがなが入力されていません。<br>"; }
if($_POST[ran]==""){ $er.="■お問い合わせ内容が入力されていません。<br>"; }
if($_POST[mail]==""){ $er.="■メールアドレスが入力されていません。<br>"; }
if(valid_mail($_POST[mail])){ }else{ $er.="■メールアドレスの書式が正しくありません<br>"; }


//送信画面
if($_POST[sousin]!=""){

	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//お客様へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=$mail;

	$subject="【自動返信確認メール】ミドリムシ専科へお問い合わせをありがとうございます。";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.=$name."様\n";
	$body.="この度は、ミドリムシ専科へ\n";
	$body.="お問い合わせを頂きまして、誠にありがとうございます。\n";
	$body.="下記の通りお問い合わせを承りましたのでご確認ください。\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$body.="お問い合わせ内容\n";
	$body.="―――――――――――――――――\n";
	$body.="■お名前：\n";
	$body.=$name."\n";
	$body.="■ふりがな：\n";
	$body.=$kana."\n";
	$body.="■お問い合わせ内容：\n";
	$body.=$ran."\n\n";	
	$body.="■メールアドレス：\n";
	$body.=$mail."\n";
	$body.="■電話番号：\n";
	$body.=$tel."\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="ミドリムシ専科運営会社\n";
	$body.="株式会社ユーコネクト\n";
	$body.="TEL:0120-799-100\n";
	$body.="（平日9:30～18:30 土日祝日お休み）\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="※お電話の際は「ミドリムシ専科お問い合わせの件」とお伝えください。\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body=mb_convert_encoding($body,"JIS","utf-8");

	/* ヘッダ */
	$headers="From:".$send."\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
	$headers.="Content-Transfer-Encoding: 7bit\n";
	$headers=mb_convert_encoding($headers,"JIS","utf-8");
	
	mail($sendoto,$subject,$body,$headers);
	
	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//担当者へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=$send;
	
	$subject="【お問い合わせ】ミドリムシ専科(スマホ)へお問い合わせがありました！";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body="ミドリムシ専科(スマホ)へのお問い合わせ内容は以下、\n\n";
	$body.="―――――――――――――――――――――――\n";
	$body.="■お名前：\n";
	$body.=$name."\n";
	$body.="■ふりがな：\n";
	$body.=$kana."\n";
	$body.="■お問い合わせ内容：\n";
	$body.=$ran."\n\n";	
	$body.="■メールアドレス：\n";
	$body.=$mail."\n";
	$body.="■電話番号：\n";
	$body.=$tel."\n";
	$body.="―――――――――――――――――――――――\n";

	$body=mb_convert_encoding($body,"JIS","utf-8");

	/* ヘッダ */
	$headers="From: ".$mail."\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
	$headers.="Content-Transfer-Encoding: 7bit\n";
	$headers=mb_convert_encoding($headers,"JIS","utf-8");
	
	mail($sendoto,$subject,$body,$headers);

	header("Location: thankyou.html");
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta http-equiv="content-script-type" content="text/javascript">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="ミドリムシ,ミドリムシエメラルド,みどりむし,スマホ,お問い合せ" />
<meta name="Description" content="ミドリムシ専科のお問い合せフォームです。" />
<title>お問い合せ</title>
<link rel="apple-touch-icon" href="../img/favicon.png" />
<link rel="stylesheet" href="jquery.mobile-1.1.1.css" />
<link rel="stylesheet" href="form.css" />
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">google.load("jquery", "1.7.1");</script>
<script src="jquery.mobile-1.1.1.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    var UA = navigator.userAgent;
    var GA_account;
    if(UA.indexOf('iPhone')> 0 || UA.indexOf('iPod')> 0 || UA.indexOf('iPad')> 0 || UA.indexOf('Android')> 0 || UA.indexOf('IEMobile')> 0 || UA.indexOf('BlackBerry')> 0 || UA.indexOf('Symbian')> 0 || UA.indexOf('Maemo')> 0){
        GA_account=("UA-30334537-6");//スマホ用プロパティID
    }else{
        GA_account=("UA-30334537-1");//PC用プロパティID
    }

  ga('create', GA_account, 'midorimushi-senka.com');
  ga('send', 'pageview');

</script>
</head>
<body>
<header id="gHeader">
  <h1>お問い合せ</h1>
  <p id="logo"><a href="https://midorimushi-senka.com/sp/"><img src="../img/cmn/logo.png" alt="ミドリムシ専科スマホサイト" width="160px" height="32"></a></p>
</header>
<div id="container" class="contact">
  <h2> お問合わせ </h2>
<?php
//入力画面用
if($_POST[kakunin]=="" or $er!=""){
?>
      <p class="ta-c"><img src="../img/contact/step2.png" alt="STEP2" class="img100"></p>
      <?php
}else{
//確認画面用
?>
      <p class="ta-c"><img src="../img/contact/step3.png" alt="STEP3" class="img100"></p>
      <?php
}
?>
    <form method="POST" name="senkasp" action="form.php" class="ui-body" data-ajax="false" data-theme="c">
      <input name="scroll" type="hidden">
    <?php
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {

	if(is_array($varvalue)){
		
		//配列を文字列にして格納
		$varvalue = implode("---", $varvalue);
		
	}
	
	$$varname=$varvalue;
	
	if($_POST[kakunin]!=""){
	//hidden
	if($varname!="scroll" and $varname!="submit" and $varname!="kakunin_x" and $varname!="sousin_x"){
	echo "<input type=\"hidden\" name=\"".$varname."\" value=\"".$varvalue."\">\n";
	}
	}
}
?>
      <?php
//入力画面用
if($_POST[kakunin]=="" or $er!=""){
?>
<!--      <p class="box_gry mb-20">【<span class="fc-red">※</span>】の箇所は必ず入力してください。</p>
-->      <?php
}else{
//確認画面用
?>
      <p class="box_gry mb-20">ご入力頂いた内容に間違いがないかをよくご確認ください。<br>
        間違いがなければ、下の「この内容で確定する」ボタンを押してください。</p>
      <?php
}

if($_POST[kakunin]!="" and $er!=""){
?>
      <div class="box_fcred mb-20">
        <p><?php echo $er; ?></p>
      </div>
      <?php
}

//入力画面用
if($_POST[kakunin]=="" or $er!=""){
?>
      <h5>お客様情報</h5>
      <div data-role="fieldcontain">
        <label for="name">お名前<span class="fc-red"> ※</span>：</label>
        <input type="text" name="name" id="name" value="<?php echo $_POST[name]; ?>">
      </div>
      <div data-role="fieldcontain">
        <label for="kana">ふりがな<span class="fc-red"> ※</span>：</label>
        <input type="text" name="kana" id="kana" value="<?php echo $_POST[kana]; ?>">
      </div>
      <div data-role="fieldcontain">
        <label for="mail">メールアドレス<span class="fc-red"> ※</span>：</label>
        <input type="email" name="mail" id="mail" value="<?php echo $_POST[mail]; ?>">
      </div>
      <div data-role="fieldcontain">
        <label for="tel">電話番号：</label>
        <input type="tel" name="tel" id="tel" value="<?php echo $_POST[tel]; ?>">
      </div>      
      <div data-role="fieldcontain">
        <label for="ran">お問い合わせ内容<span class="fc-red"> ※</span>：</label>
        <textarea cols="40" rows="8" name="ran" id="ran"><?php echo $_POST[ran]; ?></textarea>
      </div>
      <div data-role="fieldcontain" class="mt-10 mb-20">      
      <input type="submit" name="kakunin" id="kakunin" value="入力内容を確認する" data-icon="check">
      </div>      
      <?php
//確認画面用
}else{
?>
      <h5>お客様情報</h5>
      <p>お名前：</p>
      <p class="mb-10 bg-w p5"><?php echo $name; ?></p>
      <p>ふりがな：</p>
      <p class="mb-10 bg-w p5"><?php echo $kana; ?></p>
      <p>メールアドレス：</p>
      <p class="mb-10 bg-w p5"><?php echo $mail; ?></p>
      <p>電話番号：</p>
      <p class="mb-10 bg-w p5"><?php echo $tel; ?></p>      
      <p>お問い合わせ内容：</p>
      <p class="mb-10 bg-w p5"><?php echo $ran; ?></p>      
      <div data-role="fieldcontain" class="mt-10 mb-20">   
      <input type="submit" name="sousin" id="sousin" value="この内容で確定する" data-icon="check">
      </div>    
      <?php
  }
  ?>
    </form>
</div>
<footer id="gFooter">
  <p class="copy"><small>Copyright &copy; 株式会社ユーコネクト All Rights Reserved.</small></p>
</footer>
</body>
</html>
