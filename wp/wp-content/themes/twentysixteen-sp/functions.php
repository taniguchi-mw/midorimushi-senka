<?php

//=========================================
// 親テーマのstyle.cssも利用する
//=========================================
//add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
//function theme_enqueue_styles() {
//    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//}

//=========================================
// カスタム投稿タイプを利用する
//=========================================
//function create_post_type() {
//  register_post_type(
//  'book', //投稿タイプ名
//  array(
//    'label' => '書籍',
//    'labels' => array(
//       'all_items' => '書籍一覧',
//       ),
//    'description' => '書籍の紹介です',
//    'public' => true,
//    'has_archive' => true,
//    'supports' => array( //投稿編集画面内の機能を引き出す
//      'title',
//      'editor',
//      'author',
//      'custom-fields',
//      ),
//  )
//    );
//}
//add_action( 'init', 'create_post_type' );

//=========================================
// 投稿者アーカイブ非表示リダイレクト(セキュリティ強化)
//=========================================
function author_archive_redirect() {
   if( is_author() ) {
       wp_redirect( home_url());
       exit;
   }
}
add_action( 'template_redirect', 'author_archive_redirect' );

//=========================================
// ウィジェットを利用する
//=========================================
function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//=========================================
// スラッグをクラス名に追加
//=========================================
function my_body_class($classes) {
    if (is_page()) {
		//固定ページ
        $page = get_post();
        $classes[] = $page->post_name;
    } elseif (is_singular()) {
		//投稿だったら親スラッグをクラス名に追加
		$cats = get_the_category();
		$cat = $cats[0];
		if($cat->parent){
			$parent = get_category($cat->parent);
			//$parent_cat_name = $parent->cat_name;
			$parent_cat_slug = $parent->slug;
		}else{
			//$parent_cat_name = $parent->cat_name;
			$parent_cat_slug = $cat->slug;
		}
		$classes[] = $parent_cat_slug;	
	}
    return $classes;
}
add_filter('body_class', 'my_body_class');

//=========================================
// wp_head内の不要なコードを削除
//=========================================
//WordPressのバージョンを削除
remove_action('wp_head','wp_generator');
//ブログ投稿ツールを削除
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
//短縮URLを削除
remove_action('wp_head', 'wp_shortlink_wp_head');
//投稿欄の「編集」リンクを非表示
add_filter( 'edit_post_link', '__return_false');
//コメント欄の「編集」リンクを非表示
add_filter( 'edit_comment_link', '__return_false');
//コメントのフィードなどを削除
remove_action('wp_head', 'feed_links_extra', 3);
//絵文字機能を削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
//jQuery読み込みを削除　※使用するjsは旧verが必要なため二重読み込みさせない
function my_delete_local_jquery() { wp_deregister_script('jquery');}
add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' ); function my_delete_plugin_files() { wp_dequeue_style('wp-pagenavi'); }
//JavaScriptやCSSに付加されるバージョン番号をすべて削除(管理者以外)
function remove_src_ver_except_admin( $src ) {
	if ( ! current_user_can( 'administrator' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'remove_src_ver_except_admin' );
add_filter( 'style_loader_src', 'remove_src_ver_except_admin' );
//前の記事と後の記事のURLを削除
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
//自動的にpタグが挿入されるのを防ぐ(カテゴリやタグ概要)
remove_filter('term_description','wpautop');
//自動的にpタグが挿入されるのを防ぐ(投稿記事)
//remove_filter('the_content', 'wpautop');
//自動的にpタグが挿入されるのを防ぐ(抜粋)
remove_filter( 'the_excerpt', 'wpautop' );

//=========================================
// 画像を劣化させない＆「切り抜かない」選択肢を表示
//=========================================
add_filter('jpeg_quality', function($arg){return 100;});

//=========================================
// javascriptの読み込み、振り分け
//=========================================
if (!is_admin()) {
	function register_script(){
		wp_register_script('jqry', 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		wp_register_script('all',  home_url().'/sp/js/all.js');
		wp_register_script('gotopc',  home_url().'/sp/js/gotopc.js');
		wp_register_script('bxSlider',  home_url().'/sp/js/jquery.bxSlider.min.js');
		wp_register_script('easing',  home_url().'/sp/js/jquery.easing.1.3.js');
		wp_register_script('swipe',  home_url().'/sp/js/swipe.js');
	}
	function add_script() {
		register_script();
			wp_enqueue_script('jqry');
			wp_enqueue_script('all');
			wp_enqueue_script('gotopc');
			wp_enqueue_script('bxSlider');
			wp_enqueue_script('easing');
			wp_enqueue_script('swipe');
		//個別で使用したいjsがあれば、ページIDを指定
		/*if (is_page(array(1))) {
			wp_enqueue_script('slide');
		}
		elseif (is_page(array(2,3))) {
			wp_enqueue_script('lightbox');
		}*/
	}
	add_action('wp_print_scripts', 'add_script');
}

//=========================================
// cssの読み込み、振り分け
//=========================================
if (!is_admin()) {
	function register_style() {
		wp_register_style('layout', home_url().'/sp/css/layout.css');
		wp_register_style('set', home_url().'/sp/css/set.css');
		wp_register_style('bxSlider', home_url().'/sp/css/jquery.bxSlider.css');
	}
	function add_stylesheet() {
		// 共通
		register_style();
			wp_enqueue_style('layout');
			wp_enqueue_style('set');
			wp_enqueue_style('bxSlider');
		//個別で使用したいjsがあれば、ページIDを指定
		// トップページ (ID=home)
		/*if (is_page(array('home'))) {
			wp_enqueue_style('home');
		}
		// お問い合わせ (ID=contact)
		elseif (is_page(array('contact'))) {
			wp_enqueue_style('contact');
		}*/
	}
	add_action('wp_print_styles', 'add_stylesheet');
}

//=========================================
// 記事別に「head内に追加」できるようカスタムフィールドを設置
//=========================================
add_action('admin_menu', 'add_head_hooks');
add_action('save_post', 'save_add_head');
add_action('wp_head','insert_add_head');
function add_head_hooks() {
	add_meta_box('add_head', 'headに追加', 'add_head_input', 'post', 'normal', 'high');
	add_meta_box('add_head', 'headに追加', 'add_head_input', 'page', 'normal', 'high');
}
function add_head_input() {
	global $post;
	echo '<input type="hidden" name="add_head_noncename" id="add_head_noncename" value="'.wp_create_nonce('add-head').'" />';
	echo '<textarea name="add_head" id="add_head" rows="5" cols="30" style="width:100%;">'.get_post_meta($post->ID,'_add_head',true).'</textarea>';
}
function save_add_head($post_id) {
	$add_head_nonce = (isset($_POST['add_head_nonce'])) ? $_POST['add_head_nonce'] : null;
	if ($add_head_nonce == 'add-head') {
		if (!wp_verify_nonce($_POST['add_head_noncename'], 'add-head')) return $post_id;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
		$add_head = $_POST['add_head'];
		update_post_meta($post_id, '_add_head', $add_head);
	}
}
function insert_add_head() {
	if (is_page() || is_single()) {
		if (have_posts()) : while (have_posts()) : the_post();
			echo get_post_meta(get_the_ID(), '_add_head', true);
		endwhile;
	endif;
	rewind_posts();
	}
}


//=========================================
// (固定ページ)親スラッグ、カテゴリ名、カテゴリURLを取得する
//=========================================
function parent_page_cat($parent_page_cat) {
		$cat = get_the_category();
		$cat = $cat[0];
		if(isset($post->post_parent)){
			$parent_id = $post->post_parent;
			switch ($parent_cat){
				case 'slug':
				$parent_page_cat = get_post($parent_id)->post_name;
  				break;
				case 'title':
				$parent_page_cat = get_post($parent_id)->post_title;
  				break;
				case 'url':
				$parent_page_cat = get_page_link($post->post_parent);
  				break;
			default:
				$parent_page_cat = '';
			}
		} else {
			$parent_page_cat = '';
		}		
	return $parent_page_cat;
}

//=========================================
// (投稿ページ)最上位の親スラッグ、カテゴリ名を取得する
//=========================================
function root_single_cat($root_single_cat) {
	$cats = get_the_category();
	$category = $cats[0];
	$parents = get_category_parents( $category->term_id, false, ',', true);
	$parents = explode( ',', $parents );
	$root = get_category_by_slug( $parents[0] );
	if(isset($root->parent)){
		switch ($root_single_cat){
			case 'title':
				$root_single_cat = $root->name;
  			break;
			case 'slug':
				$root_single_cat = $root->slug;
  			break;
		default:
			$root_single_cat = '';
		}
		return $root_single_cat;
	}else{
		return $root_single_cat;
	}
}

//=========================================
// (投稿ページ)直近の親スラッグ、カテゴリ名を取得する
//=========================================
function parent_single_cat($parent_single_cat) {
	$cats = get_the_category();
	$cat = $cats[0];
	if(isset($cat->name)){
		switch ($parent_single_cat){
			case 'title':
				$parent_single_cat = $cat->name;
  			break;
			case 'slug':
				$parent_single_cat = $cat->slug;
  			break;
		default:
			$parent_single_cat = '';
		}
		return $parent_single_cat;
	}else{
		return $parent_single_cat;
	}
}

