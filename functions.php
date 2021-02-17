<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
				'primary_navigation' => esc_html__( 'Primary', '_s' ),
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
				'_s_custom_background_args',
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
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
  wp_enqueue_style( '_s-bootstrap', get_template_directory_uri() . '/assets/css/vendor/bootstrap.css' );
  wp_enqueue_style( '_s-style', get_template_directory_uri() . '/assets/css/main.css' );

  wp_enqueue_script( '_s-jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.min.js');  // version : 3.5.1
  wp_enqueue_script( '_s-popper', get_template_directory_uri() . '/assets/js/vendor/popper.min.js');
  wp_enqueue_script( '_s-bootstrap', get_template_directory_uri() . '/assets/js/vendor//bootstrap.min.js');

  wp_enqueue_script( '_s-script', get_template_directory_uri() . '/assets/js/main.js' );
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom post types.
 */
require get_template_directory() . '/inc/post-types.php';


if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


/**
 * Custom navwalker
 */
if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}


/**
 * Dynamically create pages/posts
 */

/*
function create_page($title,$content,$parent_id = NULL )
{
    $objPage = get_page_by_title($title, 'OBJECT', 'page');
    if( ! empty( $objPage ) )
    {
        echo "Page already exists:" . $title . "<br/>";
        return $objPage->ID;
    }

    $page_id = wp_insert_post(
            array(
            'comment_status' => 'close',
            'ping_status'    => 'close',
            'post_author'    => 1,
            'post_title'     => ucwords($title),
            'post_name'      => strtolower(str_replace(' ', '-', trim($title))),
            'post_status'    => 'publish',
            'post_content'   => $content,
            'post_type'      => 'page',
            'post_parent'    =>  $parent_id //'id_of_the_parent_page_if_it_available'
            )
        );
    echo "Created page_id=". $page_id." for page '".$title. "'<br/>";
    return $page_id;
}

function create_post($title) {
	$post_id = -1;
	$author_id = 1;

  $objPost = get_page_by_title($title, 'OBJECT', 'post');
  if( ! empty( $objPost ) )
  {
      echo "post already exists:" . $title . "<br/>";
      return $objPost->ID;
  }

  $post_id = wp_insert_post(
    array(
      'comment_status'	=>	'closed',
      'ping_status'		=>	'closed',
      'post_author'		=>	1,
      'post_name'      => strtolower(str_replace(' ', '-', trim($title))),
      'post_title'		=>	ucwords($title),
      'post_status'		=>	'publish',
      'post_type'		=>	'post'
    )
  );
  echo "Created page_id=". $post_id." for page '".$title. "'<br/>";
  return $post_id;
}



// usage
// create_page( 'Informations financières', '');
// create_post('Titre');



*/
