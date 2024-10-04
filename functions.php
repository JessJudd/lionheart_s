<?php
/**
 * lionheart_s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lionheart_s
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
function lionheart_s_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on lionheart_s, use a find and replace
		* to change 'lionheart_s' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'lionheart_s', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'lionheart_s' ),
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
			'lionheart_s_custom_background_args',
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
add_action( 'after_setup_theme', 'lionheart_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lionheart_s_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lionheart_s_content_width', 640 );
}
add_action( 'after_setup_theme', 'lionheart_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lionheart_s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lionheart_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lionheart_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lionheart_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lionheart_s_scripts() {
	wp_enqueue_style( 'lionheart_s-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'lionheart_s-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bulma-style', 'https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'styles-custom', get_template_directory_uri() . '/styles-custom.css', array(), _S_VERSION );

	wp_enqueue_style( 'gwfonts', 'https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), _S_VERSION );

	wp_enqueue_script( 'lionheart_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'lionheart_s-custom-scripts', get_template_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lionheart_s_scripts' );

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

/**
 * Custom nav walker with bulma support.
 */
require get_template_directory() . '/inc/bulma-nav-walker.php';

/**
 * Register Custom Post Type -> DOGS
 */
// Hook ht_custom_post_custom_article() to the init action hook
add_action( 'init', 'jjd_custom_post_type_dog' );
// The custom function to register a custom article post type
function jjd_custom_post_type_dog() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'Dogs' ),
        'singular_name'      => __( 'Dog' ),
        'add_new'            => __( 'Add New' ),
        'add_new_item'       => __( 'Add New Dog' ),
        'edit_item'          => __( 'Edit Dog' ),
        'new_item'           => __( 'New Dog' ),
        'all_items'          => __( 'All Dogs' ),
        'view_item'          => __( 'View Dog' ),
        'search_items'       => __( 'Search Dogs' ),
        'featured_image'     => 'Photo',
        'set_featured_image' => 'Add Photo',
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        // 'description'       => 'Holds our custom article post specific data',
        'public'            => true,
        'menu_position'     => 5,
				'menu_icon'					 => 'dashicons-pets',
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('dogs', $args);
}

/**
 * Shortcode to display 3 Ranch Story posts
 */

function display_ranch_stories() {
	$args = array(
		'numberposts'	=> 3,
	);
	$ranch_stories = get_posts( $args );

	if( ! empty( $ranch_stories ) ){
		$output = '<section class="pageContent py-5 ranchStories"><div class="container">';
		foreach ( $ranch_stories as $post ){
			// $output .= '<li><a href="' . get_permalink( $post->ID ) . '">'
			// . $post->post_title . '</a></li>';

			$permalink = get_the_permalink($post->ID);
			$excerpt = wp_trim_words( $post->post_content, 60, '...');
			$img = get_the_post_thumbnail($post->ID);
			

			$output .= '<div class="ranchStorySingle shortCode columns is-3">
              <div class="column is-two-fifths">
                <figure class="image postThumbnail is-3by2">
									<a href="'.$permalink.'">
										'. $img .'
									</a>
								</figure>
              </div>
              <div class="column">
                <div class="content">
                  <h3><a href="'.$permalink.'">'.$post->post_title.'</a></h3>
                  <p>'.$excerpt.'</p>
									<a class="button is-small" href="'.$permalink.'">Read More</a>
                </div>
              </div>
            </div>';
		}
		$output .= '</div></section>';
	}
	return $output;
}
add_shortcode('ranch_stories', 'display_ranch_stories');

/**
 * Customize the Read More
 */

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
	global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...continue reading</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Replace default class for current_page_item
 */

add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu');
function add_active_class_to_nav_menu($classes) {
	if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true)) {
			$classes = array_diff($classes, array('current-menu-item', 'current_page_item', 'is-active'));
			$classes[] = 'is-active';
	}
	return $classes;
}