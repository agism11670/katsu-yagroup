<?php
/**
 * Katsu-ya functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Katsu-ya
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function katsuya_seek_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Katsu-ya, use a find and replace
		* to change 'katsuya_seek' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'katsuya_seek', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'katsuya_seek_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'katsuya_seek_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function katsuya_seek_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'katsuya_seek_content_width', 640 );
}
add_action( 'after_setup_theme', 'katsuya_seek_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function katsuya_seek_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'katsuya_seek' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'katsuya_seek' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'katsuya_seek_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function katsuya_seek_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'katsuya_seek_scripts' );

//----------------------------------------
//	Contact Form 7で自動挿入されるPタグ、brタグを削除
//----------------------------------------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
} 

/*
* Custom Shortcodeを追加
*/
function my_php_Include($params = array()) {
	extract(shortcode_atts(array('file' => 'default'), $params));
	ob_start();
	include(STYLESHEETPATH . "/catering_new/$file.php");
	return ob_get_clean();
}
add_shortcode('myphp', 'my_php_Include');


//----------------------------------------
//	投稿機能を完全に削除
//----------------------------------------
// 1. 投稿タイプを登録解除
add_action( 'init', 'disable_post_type_post', 20 );
function disable_post_type_post() {
    unregister_post_type( 'post' );
}

// 2. 管理画面メニューとウィジェットを削除
add_action( 'admin_menu', 'remove_post_menu_pages', 999 );
function remove_post_menu_pages() {
    remove_menu_page( 'edit.php' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// 3. リライトルールの調整
add_action( 'init', 'remove_post_rewrite_rules' );
function remove_post_rewrite_rules() {
    global $wp_rewrite;
    $wp_rewrite->front = '';
    $wp_rewrite->flush_rules();
}

// 4. REST API の投稿エンドポイントを解除
add_filter( 'rest_endpoints', function( $e ) {
    if ( isset( $e['/wp/v2/posts'] ) ) {
        unset( $e['/wp/v2/posts'] );
    }
    return $e;
});

// 5. 不要ウィジェットの登録解除（任意）
add_action( 'widgets_init', function(){
    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Meta' );
});

//----------------------------------------
//	投稿機能を完全に削除
//----------------------------------------
function hide_taxonomy_description_field() {
    $screen = get_current_screen();

    // 非表示にしたいタクソノミーを指定（複数対応可）
    $target_taxonomies = ['restaurants', 'your_taxonomy_slug_2'];

    if (in_array($screen->taxonomy, $target_taxonomies)) {
        echo '<style>
            #tag-description,
            .form-field.term-description-wrap,
            .term-description-wrap {
                display: none !important;
            }
        </style>';
    }
}
add_action('admin_footer-edit-tags.php', 'hide_taxonomy_description_field');
add_action('admin_footer-term.php', 'hide_taxonomy_description_field');


//----------------------------------------
//	Contact Form７のアクセシビリティ化
//----------------------------------------
// カスタムエラーメッセージに変更
function my_wpcf7_validation_error_message_name($result, $tag) {
	$name  = $tag->name;
	if (!$name) return $result;
	$value = isset($_POST[$name]) ? $_POST[$name] : '';
	if (is_array($value)) $value = implode('', $value);
	$value = trim((string)$value);
	// 必須で空のとき
	if ($value === '') {
		switch ($name) {
			case 'firstname':
				$result->invalidate($tag, 'First Name is required.');
				break;
			case 'lastname':
				$result->invalidate($tag, 'Last Name is required.');
				break;
			case 'your-email':
				$result->invalidate($tag, 'Email Address is required.');
				break;
			case 'your-phone':
				$result->invalidate($tag, 'Phone is required.');
				break;
			case 'subject':
				$result->invalidate($tag, 'Subject is required.');
				break;
			case 'message':
				$result->invalidate($tag, 'Message is required.');
				break;
		}
	}
	return $result;
}
// text
add_filter('wpcf7_validate_text',  'my_wpcf7_validation_error_message_name', 10, 2);
add_filter('wpcf7_validate_text*', 'my_wpcf7_validation_error_message_name', 10, 2);
// email
add_filter('wpcf7_validate_email',  'my_wpcf7_validation_error_message_name', 10, 2);
add_filter('wpcf7_validate_email*', 'my_wpcf7_validation_error_message_name', 10, 2);
// tel
add_filter('wpcf7_validate_tel',  'my_wpcf7_validation_error_message_name', 10, 2);
add_filter('wpcf7_validate_tel*', 'my_wpcf7_validation_error_message_name', 10, 2);
// select
add_filter('wpcf7_validate_select',  'my_wpcf7_validation_error_message_name', 10, 2);
add_filter('wpcf7_validate_select*', 'my_wpcf7_validation_error_message_name', 10, 2);
// textarea
add_filter('wpcf7_validate_textarea',  'my_wpcf7_validation_error_message_name', 10, 2);
add_filter('wpcf7_validate_textarea*', 'my_wpcf7_validation_error_message_name', 10, 2);

//----------------------------------------
//	Contact Form 7のselectフィールドにIDを追加（ラベルとの関連付けのため）
//----------------------------------------
function add_wpcf7_select_id($content) {
	// subjectフィールドのselect要素にIDを追加（ラベルのfor属性と一致させる）
	$content = preg_replace_callback(
		'/<span class="wpcf7-form-control-wrap[^"]*" data-name="subject">(.*?)<\/span>/s',
		function($matches) {
			$wrap_content = $matches[1];
			
			// select要素にIDを追加（まだIDがない場合）
			if (!preg_match('/id="([^"]*)"/', $wrap_content)) {
				$wrap_content = preg_replace(
					'/(<select[^>]*name="subject"[^>]*)(>)/',
					'$1 id="subject"$2',
					$wrap_content
				);
			}
			
			return '<span class="wpcf7-form-control-wrap" data-name="subject">' . $wrap_content . '</span>';
		},
		$content
	);
	return $content;
}
add_filter('wpcf7_form_elements', 'add_wpcf7_select_id');

//----------------------------------------
//	Cateringフォームのselectフィールドにラベルを追加
//----------------------------------------
function add_catering_select_labels($content) {
	// sushiplatterフィールドにラベルを追加（既にラベルがない場合のみ）
	$content = preg_replace_callback(
		'/(.*?)(<select[^>]*name="sushiplatter"[^>]*id="sushiplatter"[^>]*>)/is',
		function($matches) {
			$before = $matches[1];
			$select = $matches[2];
			
			// 既にラベルが存在するかチェック（select要素の直前200文字を確認）
			$check_range = substr($before, -200);
			if (stripos($check_range, '<label') !== false && stripos($check_range, 'for="sushiplatter"') !== false) {
				return $matches[0]; // 既にラベルがある場合はそのまま
			}
			// ラベルを追加（視覚的に表示）
			return $before . '<label for="sushiplatter">Sushi Platter Quantity</label>' . $select;
		},
		$content
	);
	
	// rollplatterフィールドにラベルを追加（既にラベルがない場合のみ）
	$content = preg_replace_callback(
		'/(.*?)(<select[^>]*name="rollplatter"[^>]*id="rollplatter"[^>]*>)/is',
		function($matches) {
			$before = $matches[1];
			$select = $matches[2];
			
			// 既にラベルが存在するかチェック（select要素の直前200文字を確認）
			$check_range = substr($before, -200);
			if (stripos($check_range, '<label') !== false && stripos($check_range, 'for="rollplatter"') !== false) {
				return $matches[0]; // 既にラベルがある場合はそのまま
			}
			// ラベルを追加（視覚的に表示）
			return $before . '<label for="rollplatter">Roll Platter Quantity</label>' . $select;
		},
		$content
	);
	
	return $content;
}
add_filter('the_content', 'add_catering_select_labels', 20);