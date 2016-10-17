<?php
/**
 * Quicksand functions and definitions
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
 * @subpackage Quicksand
 * @since Quicksand 0.2.1
 */
global $quicksand_version;
global $wp_min_version;

$quicksand_version = '0.0.1';
$wp_min_version = '4.4';

/**
 * quicksand only works in WordPress 4.4 or later.
 */
if (version_compare($GLOBALS['wp_version'], $wp_min_version, '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}


if (!function_exists('quicksand_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own quicksand_setup() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_setup() {
        /*
         * Make theme available for translation.  
         */
        load_theme_textdomain('quicksand', get_template_directory() . '/languages');


        /*
         * Add default posts and comments RSS feed links to head 
         */
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
            'height' => 60,
            'width' => 240,
            'flex-height' => true,
        ));

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        // in list-view crop the image to a max-height of 300px
//        add_image_size('quicksand-featured_image', 1200, 300, array('top', 'left'));
        set_post_thumbnail_size(1200, 9999);


        /*
         * menus
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'quicksand'),
            'secondary' => __('Secondary Menu', 'quicksand')
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


        /*
         * Enable support for Custom Background
         */
        $colorSchemeDefault = quicksand_get_color_schemes()['default']['colors'];
        $customBackgroundArgs = array(
            'default-color' => $colorSchemeDefault[0],
        );
        add_theme_support('custom-background', $customBackgroundArgs);

        /**
         * By default, the user will have to crop any images they upload to fit in the width and height you specify. 
         * However, you can let users upload images of any height and width by specifying ‘flex-width’ and ‘flex-height’ as true. 
         * This will let the user skip the cropping step when they upload a new photo.
         */
        $customHeaderArgs = array(
            'default-text-color' => $colorSchemeDefault[5],  
            'flex-width' => true,
            'flex-height' => true,
            'height' => 200,
            'width' => 1200,
        );
        add_theme_support('custom-header', $customHeaderArgs);
    }

endif; // quicksand_setup
add_action('after_setup_theme', 'quicksand_setup');



if (!function_exists('quicksand_customizer_css')) :

    /**
     * include customizer-settings in new style-script
     * triggered after wp_enque_script
     */
    function quicksand_customizer_css() {

        $colorScheme = quicksand_get_color_scheme();
        ?>
        <style type="text/css">  
            /*navigation*/
            .site-nav-container,
            .site-nav-container nav.navbar,
            .site-nav-container .dropdown-menu {
                background: <?php echo get_theme_mod('wbts_nav_background_color', $colorScheme[6]); ?>;
            }

            .navbar-toggler,
            .nav-wrapper .menu-item .nav-link , 
            .nav-wrapper .menu-item .dropdown-item {
                color: <?php echo get_theme_mod('wbts_nav_link_color', $colorScheme[7]); ?>;
            }  

            .nav-wrapper .menu-item .dropdown-item.active { 
                background: <?php echo get_theme_mod('wbts_header_background_color', $colorScheme[8]); ?>;
            }


            .nav-wrapper .menu-item .dropdown-item:hover {
                background: <?php echo get_theme_mod('wbts_header_background_color', $colorScheme[8]); ?>;
            }


            /*site-header*/
            .site-info-wrapper a,
            .site-info-wrapper .site-description {  
                color: #<?php echo preg_replace('/^#/', '', get_header_textcolor()); ?>; 
            }

            .site-info-wrapper.jumbotron  {
                background: <?php echo get_theme_mod('wbts_header_background_color', $colorScheme[8]); ?>;
            }

            /*content*/
            .site-main-container { 
                background: <?php echo get_theme_mod('wbts_content_background_color', $colorScheme[1]); ?>;
                color: <?php echo get_theme_mod('wbts_content_text_color', $colorScheme[3]); ?>;
            }

            .site-main-container a, 
            .site-footer a 
            { 
                color: <?php echo get_theme_mod('wbts_content_link_color', $colorScheme[4]); ?>;
            } 

            /*bootstrap pagination*/ 
            .site-main-container .navigation.pagination .nav-links .page-numbers {
                color: <?php echo get_theme_mod('wbts_content_link_color', $colorScheme[4]); ?>;
                background: <?php echo get_theme_mod('wbts_content_background_color', $colorScheme[1]); ?>;
                border-color: <?php echo get_theme_mod('wbts_content_link_color', $colorScheme[4]); ?>;
            }  
            .bs-pagination .navigation.pagination .nav-links .page-numbers:focus,
            .bs-pagination .navigation.pagination .nav-links a:hover.page-numbers ,
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current,
            .bs-pagination .navigation.pagination .nav-links .page-numbers:hover,
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current:hover {
                color: <?php echo get_theme_mod('wbts_content_background_color', $colorScheme[1]); ?>;
                background: <?php echo get_theme_mod('wbts_content_link_color', $colorScheme[4]); ?>;
                border-color: <?php echo get_theme_mod('wbts_content_link_color', $colorScheme[4]); ?>;
            }


            /*2nd text color*/  
            .site-main-container  h1,
            .site-main-container  h2,
            .site-main-container  h3,
            .site-main-container  h4,
            .site-main-container  h5,
            .site-main-container  h6, 
            .site-main-container  h1>a,
            .site-main-container  h2>a,
            .site-main-container  h3>a,
            .site-main-container  h4>a,
            .site-main-container  h5>a,
            .site-main-container  h6>a { 
                color: <?php echo get_theme_mod('wbts_content_secondary_text_color', $colorScheme[4]); ?>;
            }

            /*footer*/ 
            .site-footer-widgetbar,
            .site-footer .row { 
                background: <?php echo get_theme_mod('wbts_footer_background_color', $colorScheme[9]); ?>; 
                color: <?php echo get_theme_mod('wbts_footer_text_color', $colorScheme[11]); ?>;
            }  

            .site-footer-widgetbar a,
            .site-footer .nav-wrapper a {  
                color: <?php echo get_theme_mod('wbts_footer_link_color', $colorScheme[10]); ?>;
                padding: 0 .6rem;
            }  
            .site-footer .nav-wrapper a:hover {  
                color: <?php echo get_theme_mod('wbts_footer_background_color', $colorScheme[9]); ?>;
                background: <?php echo get_theme_mod('wbts_footer_link_color', $colorScheme[10]); ?>;
            } 

            /*footer-social-menu*/
            .site-footer .site-social .fa-circle {
                color: <?php echo get_theme_mod('wbts_footer_link_color', $colorScheme[10]); ?>; 
            }
            .site-footer .site-social .fa-stack:hover .fa-circle { 
                opacity:0.5;
            }
        </style>
        <?php
    }

endif; //quicksand_customizer_css
add_action('wp_head', 'quicksand_customizer_css');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Quicksand 0.2.1
 */
function quicksand_content_width() {
    $GLOBALS['content_width'] = apply_filters('quicksand_content_width', 992);
}

add_action('after_setup_theme', 'quicksand_content_width', 0);



if (!function_exists('quicksand_widgets_init')) :

    /**
     * Registers a widget area.
     *
     * @link https://developer.wordpress.org/reference/functions/register_sidebar/
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_widgets_init() {

        register_sidebar(array(
            'name' => __('Sidebar', 'quicksand'),
            'id' => 'sidebar-1',
            'description' => __('Add widgets here to appear in your sidebar.', 'quicksand'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Sidebar-Footer', 'quicksand'),
            'id' => 'sidebar-2',
            'description' => __('Appears at the bottom of the content on posts and pages.', 'quicksand'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }

endif;
add_action('widgets_init', 'quicksand_widgets_init');


if (!function_exists('quicksand_get_google_fonts')) :

    /**
     * define here the google fonts you want to use
     * 
     * @since Quicksand 0.2.1
     * 
     * @return string
     */
    function quicksand_get_google_fonts() {

        $fonts = array();

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Raleway font: on or off', 'quicksand')) {
            $fonts[] = 'Raleway:400,700,900,400italic,700italic,900italic';
        }

        if ('off' !== _x('on', 'Rokkitt font: on or off', 'quicksand')) {
            $fonts[] = 'Rokkitt:400,700,900,400italic,700italic,900italic';
        }
        if ('off' !== _x('on', 'Source Code Pro: on or off', 'quicksand')) {
            $fonts[] = 'Source Code Pro:400,700,900,400italic,700italic,900italic';
        }

        return $fonts;
    }

endif;


if (!function_exists('quicksand_fonts_url')) :

    /**
     * Register Google fonts for Quicksand.
     *
     * Create your own quicksand_fonts_url() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @return string Google fonts URL for the theme.
     */
    function quicksand_fonts_url() {

        $fonts = quicksand_get_google_fonts();
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

function quicksand_get_fonts() {
    wp_enqueue_style('quicksand-fonts', quicksand_fonts_url(), array(), null);
}

add_action('wp_enqueue_scripts', 'quicksand_get_fonts');




/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Quicksand 0.2.1
 */
//function quicksand_javascript_detection() {
//	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
//}
//add_action( 'wp_head', 'quicksand_javascript_detection', 0 );


if (!function_exists('quicksand_styles')) :

    /**
     * Enqueues styles.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_styles() {

//    TODO: wp_head registrieren und  abhängigkeiten
//        
//          /*   REGISTER ALL JS FOR SITE */
//    wp_register_script('pr_cycle_all',get_stylesheet_directory_uri().'/js/pr-slider.js');
//    wp_register_script('pr_slider',get_stylesheet_directory_uri().'/js/jquery.cycle.all.min.js'); 
//
//    /*   REGISTER ALL CSS FOR SITE */
//    wp_register_style('pr_woocommerce',get_stylesheet_directory_uri().'/css/_woocommerce.css');
//    wp_register_style('pr_mobile',get_stylesheet_directory_uri().'/css/mobile.css'); 
// 

        global $quicksand_version;

        // check if custom-thememod exists 
        $currentThemeMod = get_theme_mod('color_scheme', 'default');
        $currentThemeMod = $currentThemeMod === 'default' ? '' : '-' . $currentThemeMod;
        $styleSheetToLoad = get_template_directory_uri() . '/css/quicksand' . $currentThemeMod . '.min.css';
        if (!file_exists(get_template_directory() . '/css/quicksand' . $currentThemeMod . '.min.css')) {
            // not available, load the default one instead
            $styleSheetToLoad = get_template_directory_uri() . '/css/quicksand.min.css';
        }

        // Theme stylesheet-description
        wp_enqueue_style('quicksand-desc-style', get_stylesheet_uri());

        // Theme stylesheet
        wp_enqueue_style('quicksand-style-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), $quicksand_version);
        wp_enqueue_style('quicksand-style-theme', $styleSheetToLoad, array(), $quicksand_version);

        // Javascript Comment Functionality
        // To allow full JavaScript functionality with the comment features in WordPress 2.7, 
        // the following changes must be made within the WordPress Theme template files.
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

endif;
add_action('wp_enqueue_scripts', 'quicksand_styles');



if (!function_exists('quicksand_scripts')) :

    /**
     * Enqueues scripts 
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_scripts() {
        global $quicksand_version;
        // tether is needed by bs for tooltips
        wp_enqueue_script('quicksand-script-tether', get_template_directory_uri() . '/js/tether.min.js', array(), $quicksand_version, true);
        wp_enqueue_script('quicksand-script-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), $quicksand_version, true);
    }

endif;
add_action('wp_enqueue_scripts', 'quicksand_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Quicksand 0.2.1
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function quicksand_body_classes($classes) {
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

add_filter('body_class', 'quicksand_body_classes');

/**
 * Workaround for the Bootstrap-Wordpress-tag-bug
 *
 * @since Quicksand 0.2.1
 * 
 * the tag-class is already occupied by bootstrap, so when wordpress
 * generates it in the body-class, it breaks the layout.
 * 
 * @param mixed $classes
 * @return mixed
 */
//function quicksand_bs4_remove_tag_body_class($classes) {
//    if (false !== ( $class = array_search('tag', $classes) )) {
//        unset($classes[$class]);
//    }
//    return $classes;
//}
//
//add_filter('body_class', 'quicksand_bs4_remove_tag_body_class');


if (!function_exists('quicksand_bs4_remove_tag_classes')) :

    /**
     * fix for the tag-bug. 
     * Unfortunately WP defines tag-classes, which are also
     * predefined in BS. So, lest's just terminate them ;-)
     * Exterminate! Exterminate! Exterminate! 
     * 
     * @param type $classes 
     */
    function quicksand_bs4_remove_tag_classes($classes) {
        return array_diff($classes, array(
            'tag',
            'tag-pill',
            'tag-default',
            'tag-info',
            'tag-warning',
            'tag-danger',
            'tag-success',
            'tag-primary',
        ));
    }

endif;
add_filter('body_class', 'quicksand_bs4_remove_tag_classes', 10, 1);
add_filter('post_class', 'quicksand_bs4_remove_tag_classes', 10, 1);




if (!function_exists('quicksand_bootstrap4_comment_form')) :

    /**
     * same treatment like fields in quicksand_bootstrap4_comment_form_fields
     * 
     * @param type $args
     * @return string
     */
    function quicksand_bootstrap4_comment_form($args) {
        $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x('Comment', 'noun', 'quicksand') . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
        $args['class_submit'] = 'btn btn-secondary'; // since WP 4.1 

        return $args;
    }

endif;
add_filter('comment_form_defaults', 'quicksand_bootstrap4_comment_form');





if (!function_exists('quicksand_bootstrap4_comment_form_fields')) :

    /**
     * customize comment form
     * 
     * these fields are not shown, when you're logged in
     * 
     * @see http://www.codecheese.com/2013/11/wordpress-comment-form-with-twitter-bootstrap-3-supports/
     * 
     * @param array $fields
     * @return string
     */
    function quicksand_bootstrap4_comment_form_fields($fields) {
        $commenter = wp_get_current_commenter();

        $req = get_option('require_name_email');
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $html5 = current_theme_supports('html5', 'comment-form') ? 1 : 0;

        $fields = array(
            'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __('Name', 'quicksand') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
            'email' => '<div class="form-group comment-form-email"><label for="email">' . __('Email', 'quicksand') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
            'url' => '<div class="form-group comment-form-url"><label for="url">' . __('Website', 'quicksand') . '</label> ' .
            '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>'
        );

        return $fields;
    }

endif;
add_filter('comment_form_default_fields', 'quicksand_bootstrap4_comment_form_fields');


if (!function_exists('quicksand_password_form')) :

    /**
     * customize password form
     * 
     * for password-protected posts  
     */
    function quicksand_password_form() {
        $o = '<form action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post" >'
                . __("To view this protected post, enter the password below:", 'quicksand')
                . '<div class="input-group">'
                . '<input type="password" class="form-control" name="post_password" size="20" maxlength="20">'
                . '<span class="input-group-btn"> '
                . '<button class="btn btn-secondary" href="#" type="submit">'
                . '<i class="fa fa-unlock fa-lg"></i>'
                . '</button></span></div>'
                . '</form>';
        return $o;
    }

endif;
add_filter('the_password_form', 'quicksand_password_form');

/**
 * Converts a HEX value to RGB. 
 *
 * @since Quicksand 0.2.1
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function quicksand_hex2rgb($color) {
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

if (!function_exists('quicksand_bootstrap_wrap_oembed')) :

    /**
     * make videos responsive
     * 
     * @param type $html
     * @param type $url
     * @param type $attr
     * @param type $post_id
     * 
     * @return string html
     */
    function quicksand_bootstrap_wrap_oembed($html) {
        $html = preg_replace('/(width|height)="\d*"\s/', "", $html); // Strip width and height #1
        return'<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>'; // Wrap in div element and return #3 and #4
    }

endif;
add_filter('embed_oembed_html', 'quicksand_bootstrap_wrap_oembed', 99, 4);


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Quicksand 0.2.1
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
//TODO
//function quicksand_content_image_sizes_attr($sizes, $size) {
//    $width = $size[0];
//
//    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
//
//    if ('page' === get_post_type()) {
//        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
//    } else {
//        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
//        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
//    }
//
//    return $sizes;
//}
//
//add_filter('wp_calculate_image_sizes', 'quicksand_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Quicksand 0.2.1
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
//function quicksand_post_thumbnail_sizes_attr($attr, $attachment, $size) {
//    if ('post-thumbnail' === $size) {
//        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
//        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
//    }
//    return $attr;
//}
//
//add_filter('wp_get_attachment_image_attributes', 'quicksand_post_thumbnail_sizes_attr', 10, 3);




/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom walker for the navbar 
 */
require get_template_directory() . '/inc/QuicksandNavwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
