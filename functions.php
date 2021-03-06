<?php
/**
 * merlyn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package merlyn
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

if ( ! function_exists( 'merlyn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function merlyn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on merlyn, use a find and replace
		 * to change 'merlyn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'merlyn', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'merlyn' ),
			)
		);

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
				'merlyn_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'merlyn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function merlyn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'merlyn_content_width', 640 );
}
add_action( 'after_setup_theme', 'merlyn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function merlyn_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'merlyn' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'merlyn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar( array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Sidebar 2',
		'id' => 'footer-sidebar-2',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => 'Footer Sidebar 3',
		'id' => 'footer-sidebar-3',
		'description' => 'Appears in the footer area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'merlyn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function merlyn_scripts() {

	wp_enqueue_style( 'merlyn-style', get_template_directory_uri() . '/css/merlyn.css', array(), _S_VERSION );

	wp_enqueue_style( 'merlyn-menu-style', get_template_directory_uri() . '/css/merlyn-menu.css', array(), _S_VERSION );

	wp_enqueue_style( 'merlyn-footer-style', get_template_directory_uri() . '/css/merlyn-footer.css', array(), _S_VERSION );

	wp_enqueue_style( 'merlyn-default-style', get_template_directory_uri() . '/css/defaults.css', array(), _S_VERSION );

	// wp_enqueue_style( 'merlyn-style', get_stylesheet_uri(), array(), _S_VERSION );

	// wp_style_add_data( 'merlyn-style', 'rtl', 'replace' );

	wp_enqueue_script( 'merlyn-base', get_template_directory_uri() . '/js/merlyn-base.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

	if ( is_page_template('template-index.php') ) {

		wp_enqueue_style( 'merl-index', get_template_directory_uri() . '/css/merl-index.css', array(), $cache_bust );
		// wp_enqueue_script( 'merlyn-js', get_template_directory_uri() . '/js/oko-scratchpad.js', array(), $cache_bust );

	}else if( is_single() ){ // single posts

		wp_enqueue_style( 'merl-single', get_template_directory_uri() . '/css/merl-single.css', array(), $cache_bust );

	}


}
add_action( 'wp_enqueue_scripts', 'merlyn_scripts' );


function meryln_woo_scripts(){

	if( is_shop() || is_cart() || is_checkout() || is_product() ){

		wp_enqueue_style( 'merlyn-woo-style', get_template_directory_uri() . '/css/woo.css', array(), _S_VERSION );

	}

}

add_action( 'wp_enqueue_scripts', 'meryln_woo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function merlyn_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'merlyn_add_woocommerce_support' );






// add_filter( 'acf/location/rule_values/page_type', function ( $choices ) {
//    $choices['woo_shop_page'] = 'WooCommerce Shop Page';
//    return $choices;
// });

// add_filter( 'acf/location/rule_match/page_type', function ( $match, $rule, $options ) {
//    if ( $rule['value'] == 'woo_shop_page' && isset( $options['post_id'] ) ){
//       if ( $rule['operator'] == '==' ){
//         $match = ( $options['post_id'] == wc_get_page_id( 'shop' ) );
//      	}
//       if ( $rule['operator'] == '!=' ){
//       	$match = ( $options['post_id'] != wc_get_page_id( 'shop' ) );
//       }
//    }
//    return $match;
// }, 10, 3 );