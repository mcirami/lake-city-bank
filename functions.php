<?php
/**
 * boiler functions and definitions
 *
 * @package boiler
 */

if ( ! function_exists( 'boiler_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function boiler_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'boiler' ),
		'slide_nav' => __( 'Slide Menu', 'boiler')
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // boiler_setup
add_action( 'after_setup_theme', 'boiler_setup' );

// add parent class to menu items 
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'parent-item'; 
		}
	}
	
	return $items;
}

	
/* remove some of the header bloat */

// EditURI link
remove_action( 'wp_head', 'rsd_link' );
// windows live writer
remove_action( 'wp_head', 'wlwmanifest_link' );
// index link
remove_action( 'wp_head', 'index_rel_link' );
// previous link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
// start link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
// links for adjacent posts
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
// WP version
remove_action( 'wp_head', 'wp_generator' );

// remove pesky injected css for recent comments widget
add_filter( 'wp_head', 'boiler_remove_wp_widget_recent_comments_style', 1 );
// clean up comment styles in the head
add_action('wp_head', 'boiler_remove_recent_comments_style', 1);
// clean up gallery output in wp
add_filter('gallery_style', 'boiler_gallery_style');

// Thumbnail image sizes
// add_image_size( 'thumb-400', 400, 400, true );

// remove injected CSS for recent comments widget
function boiler_remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function boiler_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function boiler_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/**
 * Register widgetized area and update sidebar with default widgets
 */

function business_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Business Sidebar', 'boiler' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'business_sidebar' );

function personal_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Personal Sidebar', 'boiler' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'personal_sidebar' );

function wealth_sidebar() {
	register_sidebar( array(
		'name'          => __( ' Wealth Sidebar', 'boiler' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wealth_sidebar' );

function about_sidebar() {
	register_sidebar( array(
		'name'          => __( 'About Sidebar', 'boiler' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'about_sidebar' );

function tools_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Tools Sidebar', 'boiler' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'tools_sidebar' );

function default_sidebar() {
	register_sidebar( array(
		'name'          => __( 'Default Sidebar', 'boiler' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'default_sidebar' );

/**
 * Enqueue scripts and styles
 */
function boiler_scripts_styles() {
	// style.css just initializes the theme. This is compiled from /sass

	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css');
	
	wp_enqueue_style( 'mmenu-pos', get_template_directory_uri() . '/js/vendor/jquery.mmenu.positioning.css');
	
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/js/vendor/jquery.mmenu.css');
	
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main.css');

	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/vendor/flexslider.css');

	wp_enqueue_script( 'jquery' , array(), '', true );
	
	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/vendor/jquery.mmenu.min.js', array('jquery'), '', true);

	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', '2.6.2', true );

	//wp_enqueue_script( 'boiler-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20120206', true );

	//wp_enqueue_script( 'boiler-main', get_template_directory_uri() . '/js/main.js', array(), '20120205', true );
	
	// Return concatenated version of JS. If you add a new JS file add it to the concatenation queue in the gruntfile. 
	// current files: js/vendor.mordernizr-2.6.2.min.js, js/plugins.js, js/main.js
	wp_enqueue_script( 'boiler-concat', get_template_directory_uri() . '/js/built.min.js', array(), '', true );
	
	wp_enqueue_script( 'ddslick', get_template_directory_uri() . '/js/vendor/jquery.ddslick.min.js', array(), '', true );
	
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '', true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'boiler_scripts_styles' );

/**
 * Registering Calculator Scripts
 */

function calc_scripts() {
	wp_register_script( 'car-loan', get_stylesheet_directory_uri() . '/js/calculators/car-loan.js', array( 'jquery' ) );
	wp_register_script( 'compound-interest', get_stylesheet_directory_uri() . '/js/calculators/compound-interest.js', array( 'jquery' ) );
	wp_register_script( 'loan-qualifier', get_stylesheet_directory_uri() . '/js/calculators/loan-qualifier.js', array( 'jquery' ) );
	wp_register_script( 'mortgage', get_stylesheet_directory_uri() . '/js/calculators/mortgage.js', array( 'jquery' ) );
	wp_register_script( 'pad', get_stylesheet_directory_uri() . '/js/calculators/pad.js', array( 'jquery' ) );
	wp_register_script( 'retirement', get_stylesheet_directory_uri() . '/js/calculators/retirement.js', array( 'jquery' ) );
	wp_register_script( 'savings', get_stylesheet_directory_uri() . '/js/calculators/savings.js', array( 'jquery' ) );
	wp_register_script( 'standard-loan', get_stylesheet_directory_uri() . '/js/calculators/standard-loan.js', array( 'jquery' ) );
}

add_action( 'wp_enqueue_scripts', 'calc_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// Auto wrap embeds with video container to make video responsive
function wrap_embed_with_div($html, $url, $attr) {
     return '<div class="video_container">' . $html . '</div>';
}

add_filter('embed_oembed_html', 'wrap_embed_with_div', 10, 3);

// Custom Login Screen
function lcb_loginlogo() {
    echo '<style type="text/css">
        h1 a {
        background-image: url(' . get_template_directory_uri() . '/images/logo.png) !important;
        background-size: 100% !important;
        width: 100% !important;
        }
        </style>';
}
add_action('login_head', 'lcb_loginlogo');

// Login Image URL
function lcb_loginURL () {
    return '/';
}
add_filter('login_headerurl', 'lcb_loginURL');

add_filter('woocommerce_login_redirect', 'lcb_login_redirect');
function lcb_login_redirect( $redirect_to ) {
	$pageID = 19;
	$redirect_to = '/';
    if(is_page('checkout')) {
	    $redirect_to = get_permalink($pageID);
    } else {
	    $redirect_to = get_permalink(20);
    }
    return $redirect_to;
}


// Option Pages
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Header');
	acf_add_options_page('Footer');
}

 function remove_excerpt_more( $more ) {
     global $post;
     return ' ';
 }

add_filter('excerpt_more', 'remove_excerpt_more');

// Sidebar function for parents and all ancestors

function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we arn't at the page, and the page is not an ancestor
}