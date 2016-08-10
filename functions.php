<?php
/**
 * kandy functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kandy
 */

if ( ! function_exists( 'kandy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kandy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kandy, use a find and replace
	 * to change 'kandy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kandy', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kandy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kandy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'kandy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kandy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kandy_content_width', 640 );
}
add_action( 'after_setup_theme', 'kandy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

// Sidebar //

function kandy_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kandy' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kandy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kandy_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function kandy_scripts() {
	wp_enqueue_style( 'kandy-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kandy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kandy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kandy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Adding an Options Page

require get_stylesheet_directory() . '/inc/options.php';

// Footer Menu //

register_nav_menus( array( 'secondary'=>'Footer Menu' ) );

// Changing the read more link //

function alter_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">More delicious stuff!</a>';
} 

add_filter ( 'the_content_more_link', 'alter_read_more_link'); 

// Post formats //

add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image') );

// Enqueue a Google Font //

function kandy_fonts_default() {
    wp_enqueue_style('kandy-fonts', 'https://fonts.googleapis.com/css?family=Raleway');
    
}

add_action ('wp_enqueue_scripts', 'kandy_fonts_default'); 

// Add a signature at the end of single posts //

add_action ('the_content', 'add_signature', 1);

add_filter('the_content','add_signature', 1);
function add_signature($knsignature) {
 global $post;
 if(($post->post_type == 'post')) 
    $knsignature .= '<div class="signature"><img src="http://phoenix.sheridanc.on.ca/~ccit3665/wp-content/themes/knguyen1/img/signature.png"></div>';
    return $knsignature;
} 