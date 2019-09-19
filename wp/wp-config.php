<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'midorimushisenka');
//define('DB_NAME', '_midorimusisenka');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');
//define('DB_USER', '_midorimusisenka');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'mw0316');
//define('DB_PASSWORD', 'emobile0316');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');
//define('DB_HOST', 'mysql523.heteml.jp');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w9A2iga^ g>6jAW1!4fbQod]+]yb8OS.b1Q^+eg:)YTKy0#Bx!wpn]~i9LIw7iYQ');
define('SECURE_AUTH_KEY',  '- hUd^+^K2$W7_I|E~+>d~rQA~HP*g&Xq:V$$[hX{wHLzCp|o!474mfPoe+@NPV>');
define('LOGGED_IN_KEY',    '^;&4Li&9L#_~H.;gi}#nLp82ngh>4MZrUwzA^+oE?0bLTSGn2orvJre U[ APK|#');
define('NONCE_KEY',        '$vsI|#}fcI<Ed+?k|vUJ+$)3g71)W*v$jw7%d| +6*tk-Fv.l:<_hE#y>Nct?G!O');
define('AUTH_SALT',        'RjCc&-f|FFt9s6+35.8HHY+2g@|VXom]gz/6AW2t9 i|>O$Gt3nDs%&Q5DBhvn.*');
define('SECURE_AUTH_SALT', 'N(Bo,-  Kpz3$.w=x,E ;YSz-AWyLtw;r-3zn7k%5;I@oPvibG_l7.:[qZRKy`;w');
define('LOGGED_IN_SALT',   '18gbV+V-OL,lRl]|+rtFG+ 2>HcPXMK$ C[Q*y2;|m1Z{{GH2YtT;ri&js?SUnuo');
define('NONCE_SALT',       'r|+5szwqow :,q+e*G5CL$A.,NzH3]|jK(V2Ls=2(Nyc61qK8[NV!/ v3Gimj|ev');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'ms_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
//define('WP_DEBUG', false);
define('WP_DEBUG', true);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
