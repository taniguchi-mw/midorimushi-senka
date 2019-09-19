<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    <p style="font-weight:bold;" align="center"><?php echo htmlspecialchars($_GET['mail']); ?>　宛に送信完了致しました。</p>
    <p align="center">10分程お待ちいただいてもメールが届かない場合、<br />
      以下の理由が考えられます。</p>
    <p align="center">・メールアドレスが正しく入力されていない。<br />
      ・メール受信設定によりパソコンからのメール拒否を行なっている。</p>
    <p align="center">上記の理由で送信されない場合は、<br />
      設定の変更を行った上で再度送信してください。</p>
  </div>
</div>
</body>
</html>
