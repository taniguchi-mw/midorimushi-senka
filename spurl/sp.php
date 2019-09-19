<?php
error_reporting(0);
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
if($_POST['mail']==""){ $er.="●メールアドレスが入力されておりません。<br>"; }
if(valid_mail($_POST['mail'])){ }else{ $er.="●メールアドレスの書式が正しくありません<br>"; }


//送信画面
if($_POST[sousin_x]!="" and $er==""){


	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//お客様へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=htmlspecialchars($mail);

	$subject="【自動送信メール】ミドリムシ専科スマートフォンサイトURL";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body.="この度は、ミドリムシ専科をご利用いただき、";
	$body.="誠にありがとうございます。\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$body.="スマートフォンサイトはこちらです。\n";
	$body.="https://midorimushi-senka.com/sp/\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n\n";
	$body.="※自動返信でメールをお送りしております。";
	$body.="このメールに心当たりが無い場合には、お手数ですが、このメールの宛先（info@midorimushi-senka.com）に返信をお願い致します。\n\n";
	$body.="ご不明な点・ご質問等がございましたら、下記までお問い合わせください。\n";
	$body.="----------------------------------\n";
	$body.="ミドリムシ専科運営会社\n";
	$body.="株式会社ユーコネクト\n";
	$body.="https://midorimushi-senka.com/\n";
	$body.="フリーダイヤル：0120-799-100\n";
	$body.="平日AM10:00～PM6:30 土日祝祭日休み\n";
	$body.="----------------------------------\n";
	$body=mb_convert_encoding($body,"JIS","utf-8");

	/* ヘッダ */
	$headers="From:".$send."\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
	$headers.="Content-Transfer-Encoding: 7bit\n";
	$headers=mb_convert_encoding($headers,"JIS","utf-8");
	
	mail($sendoto,$subject,$body,$headers);
	
	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//ユーコネクト担当者へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=$send;
	
	$subject="【スマホサイト】ミドリムシ専科のスマホサイトURLを送信しました。";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body="ミドリムシ専科スマホサイトURL送信者は以下\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="■メールアドレス：\n";
	$body.=htmlspecialchars($mail)."\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";

	$body=mb_convert_encoding($body,"JIS","utf-8");

	/* ヘッダ */
	$headers="From: ".$mail."\n";
	$headers.="MIME-Version: 1.0\n";
	$headers.="Content-type: text/plain; charset=\"iso-2022-jp\"\n";
	$headers.="Content-Transfer-Encoding: 7bit\n";
	$headers=mb_convert_encoding($headers,"JIS","utf-8");
	
	mail($sendoto,$subject,$body,$headers);

	header("Location: thankyou.php?mail=$mail");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="https://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja" dir="ltr">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
p {
	font-size: 14px;
	line-height: 1.2em;
}
.dispBox {
	display: table;
	width: 100%;
	height: 330px;
	margin: 0 auto;
}
.dispBox_c {
	display: table-cell;
	text-align: center;
	vertical-align: middle;
}
-->
</style>
</head>
<body>
<div class="dispBox">
  <div class="dispBox_c">
    <form method="POST" name="sp" action="sp.php">
      <input name="scroll" type="hidden">
      <?php
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {

	if(is_array($varvalue)){

		for($i=0;$i<sizeof($varvalue);$i++){
		$varvalue2.=$varvalue[$i];
		if($varvalue[$i]!="" and $varvalue[($i+1)]!=""){ $varvalue2.="---"; }
		}
		
		$varvalue=$varvalue2;
		$varvalue2="";
	}
	
	$$varname=$varvalue;
	
	if($_POST[sousin_x]!="" and $er==""){
	//hidden
	if($varname!="scroll" and $varname!="submit" and $varname!="sousin_x"){
	echo "<input type=\"hidden\" name=\"".$varname."\" value=\"".$varvalue."\">\n";
	}
	}
}
?>
      <?php
  //エラー表示	
if($_POST[sousin_x]!="" and $er!=""){
?>
      <p align="center" style="color:#FF0000; font-weight:bold;"><?php echo $er; ?></p>
      <?php
}
//入力画面用
if($_POST[sousin_x]=="" or $er!=""){
?>
      <p align="center">メールを受け取るアドレスを入力してください。</p>
      <p align="center">
        <input name="mail" type="text" id="mail" size="40" value="<?php echo htmlspecialchars($_POST['mail']); ?>" style="ime-mode:disabled;height:20px;" />
      </p>
      <p align="center" style="color:#669900">※半角英数でご入力ください。</p>
      <p align="center">
        <input type="submit" name="sousin_x" value="送信する" />
      </p>
      <?php
}
?>
    </form>
  </div>
</div>
</body>
</html>
