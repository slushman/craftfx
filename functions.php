<?php
/**
 * The Craft functions and definitions
 *
 * @package The Craft
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'the_craft_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function the_craft_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on The Craft, use a find and replace
	 * to change 'the-craft' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'the-craft', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'the-craft' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Enable support for Featured Images
	 */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 300, 200, TRUE );

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'home_thumb', 300, 200, TRUE );
	}

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'widget_thumb', 148, 100, TRUE );
	}

	/**
	 * Setup the WordPress core custom background feature.
	 */
	/*add_theme_support( 'custom-background', apply_filters( 'the_craft_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/

	/**
	 * Setup the Jetpack infinite scroll
	 */
	add_theme_support( 'infinite-scroll', array(
	    'container'     	=> 'content',
	    'footer' 			=> 'blog',
	    'posts_per_page' 	=> 5
	) );
}
endif; // the_craft_setup
add_action( 'after_setup_theme', 'the_craft_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function the_craft_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'the-craft' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'the_craft_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function the_craft_scripts() {
	wp_enqueue_style( 'the-craft-style', get_stylesheet_uri() );

	wp_enqueue_script( 'the-craft-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'the-craft-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'the-craft-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	// Register & Enqueue Google Font
	$fontURL = 'http://fonts.googleapis.com/css?family=Lobster+Two';	
	wp_register_style( 'googleFont', $fontURL );
	wp_enqueue_style( 'googleFont' );

	// Register & Enqueue MyFonts Font
	$fontURL = 'http://hello.myfonts.net/count/283ed8';	
	wp_register_style( 'myfonts', $fontURL );
	wp_enqueue_style( 'myfonts' );

}

add_action( 'wp_enqueue_scripts', 'the_craft_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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



/**
 * Social Menus
 */
add_action( 'init', 'my_register_nav_menus' );

function my_register_nav_menus() {

	register_nav_menu( 'social', __( 'Social', 'the-craft' ) );

}




/**
 * Customize footer
 */
function custom_footer_left() {

	get_template_part( 'menu', 'social' );

} // End of careers_credits()
add_action( 'footer_left', 'custom_footer_left' );

function custom_site_info() {

	printf( __( '<div class="copyright">All content &copy %1$s &nbsp; <a href="%2$s" title="Login">%3$s</a> &nbsp; All Rights Reserved.</div>', 'slushman_starter' ), date( 'Y' ), get_admin_url(), get_bloginfo( 'name' ) );

} // End of careers_credits()
add_action( 'site_info', 'custom_site_info' );

function slushman_credits() {

	printf( __( '<a href="http://%1$s.com" class="%1$s" rel="designer" >%2$s</a>', 'slushman_starter' ), 'slushman', 'Slushman' );

	printf( __( '<a href="http://%1$s.com" class="%1$s" rel="designer" ></a>', 'slushman_starter' ), 'tinygrayumbrella' );

} // End of careers_credits()
add_action( 'site_credits', 'slushman_credits' );




/**
 * Customize latest post on home page
 */
function latest_post_class( $postid ) {

	$last 		= wp_get_recent_posts( array( 'numberposts' => '1', 'post_status' => 'publish' ) );
	$last_id 	= $last['0']['ID'];
	$class		= '';

	if ( $postid == $last['0']['ID']  ) {

		$class = 'latest_post';

	}

	return $class;

} // End of latest_post_class()


add_filter( 'use_default_gallery_style', '__return_false' );

function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function craft_excerpt( $count ) {

	$permalink 	= get_permalink( get_the_ID() );
  	$excerpt 	= get_the_content();
  	$excerpt 	= strip_tags( $excerpt );

  	if ( strlen( $excerpt ) > $count ) {

  		$excerpt = substr( $excerpt, 0, $count );
  		$excerpt = $excerpt . ' ... <a href="' . $permalink . '">more</a>';

  	}

  	return $excerpt;

} // End of 