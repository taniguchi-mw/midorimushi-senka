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
if($_POST[coname]==""){ $er.="■法人名又は店舗名等が入力されておりません。<br />"; }
if($_POST[cokana]==""){ $er.="■法人名又は店舗名等（フリガナ）が入力されておりません。<br />"; }
if($_POST[name]==""){ $er.="■ご担当者氏名が入力されておりません。<br />"; }
if($_POST[kana]==""){ $er.="■ご担当者氏名（フリガナ）が入力されておりません。<br />"; }
if($_POST[yubin1]==""){ $er.="■郵便番号が入力されておりません。<br>"; }
if($_POST[jyusyo1]==""){ $er.="■ご住所(都道府県市区町村)が入力されておりません。<br>"; }
if($_POST[jyusyo2]==""){ $er.="■ご住所(番地・建物名等)が入力されておりません。<br>"; }
if($_POST[tel1]==""){ $er.="■電話番号が入力されておりません。<br>"; }
if($_POST[mail]==""){ $er.="■メールアドレスが入力されておりません。<br>"; }
if(valid_mail($_POST[mail])){ }else{ $er.="■メールアドレスの書式が正しくありません<br>"; }

//送信画面
if($_POST[sousin_x]!=""){


	//※※※※※※※※※※※※※※※※※※※※※※※※※
	//お客様へメール
	//※※※※※※※※※※※※※※※※※※※※※※※※※

	$sendoto=$mail;

	$subject="【自動返信確認メール】【ミドリムシ専科】販売店をご検討いただきありがとうございます。";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.=$coname."\n";
	$body.=$name."様\n";
	$body.="この度は、ミドリムシ専科へ\n";
	$body.="販売店のご検討をいただきまして、誠にありがとうございます。\n";
	$body.="下記の通り承りましたのでご確認ください。\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n\n";
	$body.="お問い合わせ内容\n";
	$body.="**********************************************************************\n";
	$body.="■法人名又は店舗名等：\n";
	$body.=$coname."\n";
	$body.="■法人名又は店舗名等（フリガナ）：\n";
	$body.=$cokana."\n";
	$body.="■ご担当者氏名：\n";
	$body.=$name."\n";
	$body.="■ご担当者氏名（フリガナ）：\n";
	$body.=$kana."\n";
	$body.="■郵便番号：\n";
	$body.=$yubin1."\n";
	$body.="■ご住所(都道府県市区町村)：\n";
	$body.=$jyusyo1."\n";
	$body.="■ご住所(番地・建物名等)：\n";
	$body.=$jyusyo2."\n";
	$body.="■電話番号：\n";
	$body.=$tel1."\n";
	$body.="■メールアドレス：\n";
	$body.=$mail."\n";
	$body.="■備考(ご要望・ご質問等)：\n";
	$body.=$ran."\n\n";
	$body.="------------------------------------------------------------------\n";
	$body.="■販売店募集に関する諸注意\n";
	$body.="※法人様限定で募集しております。\n";
	$body.="※インターネット販売での新規お取引は終了させていただきました。\n";
	$body.="------------------------------------------------------------------\n\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="ミドリムシ専科運営会社 株式会社ユーコネクト\n";
	$body.="https://midorimushi-senka.com/\n";
	$body.="フリーダイヤル 0120-799-100（平日AM10:00～PM6:30 土日祝祭日休み）\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
	$body.="※お電話の際は「ミドリムシ専科販売店募集の件」とお伝えください。\n";
	$body.="＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝\n";
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
	
	$subject="【販売店募集】ミドリムシ専科へ販売店募集がありました！";
	$subject=mb_convert_encoding($subject,"JIS","utf-8");
	$subject=base64_encode($subject);
	$subject="=?iso-2022-jp?B?".$subject."?=";
	
	//* 内容
	$body="ミドリムシ専科へのお問い合わせ内容は以下、\n\n";
	$body.="**********************************************************************\n";
	$body.="■法人名又は店舗名等：\n";
	$body.=$coname."\n";
	$body.="■法人名又は店舗名等（フリガナ）：\n";
	$body.=$cokana."\n";
	$body.="■ご担当者氏名：\n";
	$body.=$name."\n";
	$body.="■ご担当者氏名（フリガナ）：\n";
	$body.=$kana."\n";
	$body.="■郵便番号：\n";
	$body.=$yubin1."\n";
	$body.="■ご住所(都道府県市区町村)：\n";
	$body.=$jyusyo1."\n";
	$body.="■ご住所(番地・建物名等)：\n";
	$body.=$jyusyo2."\n";
	$body.="■電話番号：\n";
	$body.=$tel1."\n";
	$body.="■メールアドレス：\n";
	$body.=$mail."\n";
	$body.="■備考(ご要望・ご質問等)：\n";
	$body.=$ran."\n\n";
	$body.="**********************************************************************\n";

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
<meta http-equiv="content-script-type" content="text/javascript" />
<meta name="robots" content="noindex,nofollow" />
<link href="../css/formcommon.css" rel="stylesheet" type="text/css" />
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<title>販売店募集フォーム　｜　ミドリムシ専科</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-30334537-1', 'midorimushi-senka.com');
  ga('send', 'pageview');

</script>
</head>
<body onLoad="javascript:scr();">
<form method="POST" name="uconnect" action="form.php">
  <input name="scroll" type="hidden">
  <?php
$empty = $POST = array();
foreach ($HTTP_POST_VARS as $varname => $varvalue) {

	if(is_array($varvalue)){
		
		//配列を文字列にして格納
		$varvalue = implode("---", $varvalue);
		
	}
	
	$$varname=$varvalue;
	
	if($_POST[kakunin_x]!=""){
	//hidden
	if($varname!="scroll" and $varname!="submit" and $varname!="kakunin_x" and $varname!="sousin_x"){
	echo "<input type=\"hidden\" name=\"".$varname."\" value=\"".$varvalue."\">\n";
	}
	}
}
?>
  <header id="gHeader">
    <h1><img src="../img/contact/logo.jpg" alt="ミドリムシ専科" /></h1>
    <p id="logotxt">販売店募集フォーム</p>
  </header>
  <article id="container">
    <?php
  //入力画面用
  if($_POST[kakunin_x]=="" or $er!=""){
  ?>
    <h2>2.入力画面</h2>
    <div class="order_txt01">
      <p class="fc-redb">お問い合わせ時の諸注意</p>
      <p>お手数ですが、<span class="fc-redb">※</span>の箇所は全てご入力をお願い致します。<br />
        ご入力情報は SSL暗号化通信により保護されます。</p>
    </div>
    <div class="step"><img src="../img/contact/step02.jpg" /></div>
    <?php
  }else{
  //確認画面用
  ?>
    <h2>3.確認画面</h2>
    <div class="order_txt01">
      <p>ご入力頂いた内容に間違いがないかをよくご確認ください。<br />
        間違いがなければ、下の「この内容で確定する」ボタンを押してください。</p>
    </div>
    <div class="step"><img src="../img/contact/step03.jpg" /></div>
    <?php
  }

if($_POST[kakunin_x]!="" and $er!=""){
?>
    <div class="order_txt02">
      <p><?php echo $er; ?></p>
    </div>
    <?php
}

//入力画面用
if($_POST[kakunin_x]=="" or $er!=""){
?>
    <div class="conbox900">
      <h3>お客様情報</h3>
      <div class="formbox">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th><span class="fc-redb">※</span>法人名又は店舗名等</th>
              <td><input name="coname" type="text" class="text" value="<?php echo $coname; ?>" size="50" /></td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>法人名又は店舗名等<br />
                （フリガナ）</th>
              <td><input name="cokana" type="text" class="text" value="<?php echo $cokana; ?>" size="50" /></td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>ご担当者氏名</th>
              <td><input name="name" type="text" class="text" value="<?php echo $name; ?>" /></td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>ご担当者氏名(フリガナ)</th>
              <td><input name="kana" type="text" class="text" value="<?php echo $kana; ?>" /></td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>郵便番号</th>
              <td><input name="yubin1" type="text" class="text" value="<?php echo $yubin1; ?>" size="9" />
                <br>
                ※半角数字</td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>ご住所(都道府県市区町村)</th>
              <td><input name="jyusyo1" type="text" class="text" value="<?php echo $jyusyo1; ?>" size="80" />
              </td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>ご住所(番地・建物名等)</th>
              <td><input name="jyusyo2" type="text" class="text" value="<?php echo $jyusyo2; ?>" size="80" />
              </td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>電話番号</th>
              <td><input type="text" name="tel1" class="text" value="<?php echo $tel1; ?>" size="15" maxlength="15" />
                <br>
                ※半角数字</td>
            </tr>
            <tr>
              <th><span class="fc-redb">※</span>メールアドレス</th>
              <td><input name="mail" type="text" id="mail" size="50" value="<?php echo $_POST[mail]; ?>" style="ime-mode:disabled;" />
                <br />
                ※半角英数 </td>
            </tr>
            <tr>
              <th>備考(ご要望・ご質問等)</th>
              <td><textarea name="ran" id="ran" cols="80" rows="5"><?php echo $_POST[ran]; ?></textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="btn_inner">
        <input type="image" name="kakunin" src="../img/contact/btn_kakunin.jpg" alt="確認画面へ進む" />
      </div>
    </div>
    <!--conbox-->
    <?php
  //確認画面用
  }else{
  ?>
    <div class="conbox900">
      <h3>お客様情報</h3>
      <div class="formbox">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <th>法人名又は店舗名等</th>
              <td><?php echo $coname; ?></td>
            </tr>
            <tr>
              <th>法人名又は店舗名等<br />
                （フリガナ）</th>
              <td><?php echo $cokana; ?></td>
            </tr>
            <tr>
              <th>ご担当者氏名</th>
              <td><?php echo $name; ?></td>
            </tr>
            <tr>
              <th>ご担当者氏名(フリガナ)</th>
              <td><?php echo $kana; ?></td>
            </tr>
            <tr>
              <th>郵便番号</th>
              <td><?php echo $yubin1; ?></td>
            </tr>
            <tr>
              <th>ご住所(都道府県市区町村)</th>
              <td><?php echo $jyusyo1; ?> </td>
            </tr>
            <tr>
              <th>ご住所(番地・建物名等)</th>
              <td><?php echo $jyusyo2; ?></td>
            </tr>
            <tr>
              <th>電話番号</th>
              <td><?php echo $tel1; ?></td>
            </tr>
            <tr>
              <th>メールアドレス</th>
              <td><?php echo $_POST[mail]; ?></td>
            </tr>
            <tr>
              <th>備考(ご要望・ご質問等)</th>
              <td><?php echo $_POST[ran]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="btn_inner">
        <input type="image" name="sousin" src="../img/contact/btn_soushin.jpg" alt="この内容で確定する" />
      </div>
    </div>
    <!--conbox-->
    <?php
  }
  ?>
  </article>
  <aside class="f_bg clear">
    <footer id="gFooter">
      <p id="copy" class="clear"><small>Copyright &copy; 株式会社ユーコネクト. All Rights Reserved.</small></p>
    </footer>
  </aside>
</form>
</body>
</html>
