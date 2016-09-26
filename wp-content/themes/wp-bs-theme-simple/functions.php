<?php
/**
 * WP-bs-theme-simple functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since WP-bs-theme-simple 1.0
 */
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */

include_once get_template_directory() . '/inc/WP-bs-theme-simple-navwalker.php';

global $wp_bs_theme_simple_version;
global $wp_min_version;

$wp_bs_theme_simple_version = '0.0.1';
$wp_min_version = '4.4';




/**
 * wp-bs-theme-simple only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], $wp_min_version, '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}




if (!function_exists('wp_bs_theme_simple_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own wp_bs_theme_simple_setup() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 1.0
     */
    function wp_bs_theme_simple_setup() {
        /*
         * Make theme available for translation.  
         */
        load_theme_textdomain('wp-bs-theme-simple', get_template_directory() . '/languages');


        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for custom logo 
         */
        add_theme_support('custom-logo', array(
            'height' => 50,
            'width' => 50,
            'flex-height' => true,
        ));

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 9999);



        /*
         * sidebars 
         * This theme uses wp_nav_menu() in 3 locations.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'wp_bs_theme_simple'),
            'secondary' => __('Secondary Menu', 'wp_bs_theme_simple'), 
        ));

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

	/*
	 * Enable support for Post Formats.
         * 
         * Inside the index-file a template-part is called with get_post_format(),
         * so the propper template is assembled. If not available, the normal content.php is used.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) ); 
        
        
        
        
        
        //====================================================================
        

        $customBackgroundArgs = array(
//            'default-color' => '000000',          // is only shown after saving
//            'default-image' => '%1$s/img/autumn.jpg',
        );
        add_theme_support('custom-background', $customBackgroundArgs);

        $customHeaderArgs = array(
//            'default-image' => '%1$s/img/autumn.jpg',
        );
        add_theme_support('custom-header', $customHeaderArgs);
    }

endif; // wp_bs_theme_simple_setup
add_action('after_setup_theme', 'wp_bs_theme_simple_setup');




//====================================================================




if (!function_exists('wp_bs_theme_simple_styles')) :

    function wp_bs_theme_simple_styles() {

        global $wp_bs_theme_simple_version;

        // Theme stylesheet-description
        wp_enqueue_style('wp-bs-theme-simple-desc', get_stylesheet_uri());

        // Theme stylesheet.
        wp_enqueue_style('wp-bs-theme-simple', get_template_directory_uri() . '/css/wp-bs-theme-simple.css', array(), $wp_bs_theme_simple_version);
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_styles');



if (!function_exists('wp_bs_theme_simple_scripts')) :

    function wp_bs_theme_simple_scripts() {
        global $wp_bs_theme_simple_version;
        wp_enqueue_script('wp-bs-theme-simple-script', get_template_directory_uri() . '/js/wp-bs-theme-simple.js', array('jquery'), $wp_bs_theme_simple_version, true);
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_scripts');







/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since WP-bs-theme-simple 1.0
 */
if (!function_exists('wp_bs_theme_simple_widgets_init')) :

    function wp_bs_theme_simple_widgets_init() {

        register_sidebar(array(
            'name' => __('Sidebar', 'wp_bs_theme_simple'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'wp_bs_theme_simple'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Widget Bar Footer', 'wp_bs_theme_simple'),
            'id' => 'sidebar-2',
            'description' => __('Appears at the bottom of the content on posts and pages.', 'wp_bs_theme_simple'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }

endif;

add_action('widgets_init', 'wp_bs_theme_simple_widgets_init');







/**
 * Workaround for the bootstrap-wordpress-tag-bug
 * 
 * the tag-class is already occupied by bootstrap, so when wordpress
 * generates it in the body-class, it breaks the layout.
 */
add_filter('body_class', 'bs4_remove_tag_body_class');

function bs4_remove_tag_body_class($classes) {
    if (false !== ( $class = array_search('tag', $classes) )) {
        unset($classes[$class]);
    }
    return $classes;
}

//add_filter( 'body_class', '_twbs_bootstrap_20542', 10, 1 );
//add_filter( 'post_class', '_twbs_bootstrap_20542', 10, 1 );
//function _twbs_bootstrap_20542( $classes )
//{
//    return array_diff( $classes, array(
//        'tag',
//        'tag-pill',
//        'tag-default',
//        'tag-info',
//        'tag-warning',
//        'tag-danger',
//        'tag-success',
//        'tag-primary',
//    ) );
//}




/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
