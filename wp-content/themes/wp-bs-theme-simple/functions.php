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
 * @subpackage WP-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */

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
            'secondary' => __('Secondary Menu', 'wp_bs_theme_simple')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * 
         * Inside the index-file a template-part is called with get_post_format(),
         * so the propper template is assembled. If not available, the normal content.php is used.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
//            'aside',
//            'image',
//            'video',
//            'quote',
            'link',
//            'gallery',
//            'status',
//            'audio',
//            'chat',
        ));

        $customBackgroundArgs = array(
            'default-color' => 'ffffff',
        );
        add_theme_support('custom-background', $customBackgroundArgs);

        $customHeaderArgs = array(
            'default-text-color' => 'ffffff',
        );
        add_theme_support('custom-header', $customHeaderArgs);
    }

endif; // wp_bs_theme_simple_setup
add_action('after_setup_theme', 'wp_bs_theme_simple_setup');

/**
 * include customizer-settings in new style-script
 */
function wp_bs_theme_simple_customizer_css() {
    ?>
    <style type="text/css"> 
        .site-main-container { 
            background: <?php echo get_theme_mod('wbts_background_color'); ?>;
            color: <?php echo get_theme_mod('wbts_text_color'); ?>;
        }
        a  { 
            color: <?php echo get_theme_mod('wbts_link_color'); ?>;
        } 

        .site-main-container .site-info-wrapper .site-title,
        .site-main-container .site-info-wrapper .site-description {
            color: #<?php echo get_header_textcolor(); ?>;
        } 

        nav.navbar  {
            background: <?php echo get_theme_mod('wbts_nav_background_color'); ?>;
        }
        nav.navbar #menu-primary .nav-item .nav-link {
            color: <?php echo get_theme_mod('wbts_nav_link_color'); ?>;
        } 

    </style>
    <?php
}

add_action('wp_head', 'wp_bs_theme_simple_customizer_css');





/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since WP-bs-theme-simple 0.0.1
 */
//function wp_bs_theme_simple_content_width() {
//	$GLOBALS['content_width'] = apply_filters( 'wp_bs_theme_simple_content_width', 840 );
//}
//add_action( 'after_setup_theme', 'wp_bs_theme_simple_content_width', 0 );



if (!function_exists('wp_bs_theme_simple_widgets_init')) :

    /**
     * Registers a widget area.
     *
     * @link https://developer.wordpress.org/reference/functions/register_sidebar/
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_widgets_init() {

        register_sidebar(array(
            'name' => __('Sidebar', 'wp-bs-theme-simple'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'simple'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Widget Bar Footer', 'wp-bs-theme-simple'),
            'id' => 'sidebar-2',
            'description' => __('Appears at the bottom of the content on posts and pages.', 'simple'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }

endif;

add_action('widgets_init', 'wp_bs_theme_simple_widgets_init');


if (!function_exists('wp_bs_theme_simple_get_google_fonts')) :

    /**
     * define here the google fonts you want to use
     * 
     * @since WP-bs-theme-simple 0.0.1
     * 
     * @return string
     */
    function wp_bs_theme_simple_get_google_fonts() {

        $fonts = array();

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Raleway font: on or off', 'wp-bs-theme-simple')) {
            $fonts[] = 'Raleway:400,700,900,400italic,700italic,900italic';
        }

        if ('off' !== _x('on', 'Titillium Web font: on or off', 'wp-bs-theme-simple')) {
            $fonts[] = 'Titillium Web:400,700,900,400italic,700italic,900italic';
        }

        if ('off' !== _x('on', 'Dosis font: on or off', 'wp-bs-theme-simple')) {
            $fonts[] = 'Dosis:400,700,900,400italic,700italic,900italic';
        }

        if ('off' !== _x('on', 'Inconsolata font: on or off', 'wp-bs-theme-simple')) {
            $fonts[] = 'Inconsolata:400,700,900,400italic,700italic,900italic';
        }

        return $fonts;
    }

endif;


if (!function_exists('wp_bs_theme_simple_fonts_url')) :

    /**
     * Register Google fonts for WP-bs-theme-simple.
     *
     * Create your own wp_bs_theme_simple_fonts_url() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @return string Google fonts URL for the theme.
     */
    function wp_bs_theme_simple_fonts_url() {

        $fonts = wp_bs_theme_simple_get_google_fonts();
        $fonts_url = '';
        $subsets = 'latin,latin-ext';

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

function wp_bs_theme_simple_get_fonts() {
    wp_enqueue_style('wp_bs_theme_simple-fonts', wp_bs_theme_simple_fonts_url(), array(), null);
}

add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_get_fonts');




/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since WP-bs-theme-simple 0.0.1
 */
//function wp_bs_theme_simple_javascript_detection() {
//	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
//}
//add_action( 'wp_head', 'wp_bs_theme_simple_javascript_detection', 0 );


if (!function_exists('wp_bs_theme_simple_styles')) :

    /**
     * Enqueues styles.
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_styles() {

        global $wp_bs_theme_simple_version;

        // Theme stylesheet-description
        wp_enqueue_style('wp-bs-theme-simple-desc-style', get_stylesheet_uri());

        // Theme stylesheet
        wp_enqueue_style('wp-bs-theme-simple-style', get_template_directory_uri() . '/css/wp-bs-theme-simple.css', array(), $wp_bs_theme_simple_version);
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_styles');



if (!function_exists('wp_bs_theme_simple_scripts')) :

    /**
     * Enqueues scripts 
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_scripts() {
        global $wp_bs_theme_simple_version;
        wp_enqueue_script('wp-bs-theme-simple-script', get_template_directory_uri() . '/js/wp-bs-theme-simple.js', array('jquery'), $wp_bs_theme_simple_version, true);
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function wp_bs_theme_simple_body_classes($classes) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'wp_bs_theme_simple_body_classes');



/**
 * Workaround for the Bootstrap-Wordpress-tag-bug
 *
 * @since WP-bs-theme-simple 0.0.1
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
 * Converts a HEX value to RGB. 
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function wp_bs_theme_simple_hex2rgb($color) {
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array('red' => $r, 'green' => $g, 'blue' => $b);
}

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function wp_bs_theme_simple_content_image_sizes_attr($sizes, $size) {
    $width = $size[0];

    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'wp_bs_theme_simple_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function wp_bs_theme_simple_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'wp_bs_theme_simple_post_thumbnail_sizes_attr', 10, 3);

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
//function wp_bs_theme_simple_widget_tag_cloud_args( $args ) {
//	$args['largest'] = 1;
//	$args['smallest'] = 1;
//	$args['unit'] = 'em';
//	return $args;
//}
//add_filter( 'widget_tag_cloud_args', 'wp_bs_theme_simple_widget_tag_cloud_args' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom walker for the navbar 
 */
require get_template_directory() . '/inc/WP-bs-theme-simple-navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
