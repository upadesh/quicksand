<?php
/**
 * Twenty Sixteen functions and definitions
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
 * @since Twenty Sixteen 1.0
 */
/*
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */

if (!function_exists('wp_bs_theme_simple_styles')) :

    function wp_bs_theme_simple_styles() {

        // Theme stylesheet-description
        wp_enqueue_style('wp-bs-theme-simple-desc', get_stylesheet_uri());

        // Theme stylesheet.
        wp_enqueue_style('wp-bs-theme-simple', get_template_directory_uri() . '/css/wp-bs-theme-simple.css', array());
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_styles');





if (!function_exists('wp_bs_theme_simple_setup')) :

    function wp_bs_theme_simple_setup() {

        add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('post-formats', array(
            'link'
        ));

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        $customBackgroundArgs = array(
//            'default-color' => '000000',          // is only shown after saving
//            'default-image' => '%1$s/img/autumn.jpg',
        );
        add_theme_support('custom-background', $customBackgroundArgs);

        $customHeaderArgs = array(
//            'default-image' => '%1$s/img/autumn.jpg',
        );
        add_theme_support('custom-header', $customHeaderArgs);

//        register_nav_menus(array(
//            'main_menu' => __('Main Menu', 'bootstrap-four'),
//                // 'footer_menu' => 'Footer Menu'
//        ));
//        add_editor_style('css/bootstrap.min.css');
    }

endif; // wp_bs_theme_simple_setup
add_action('after_setup_theme', 'wp_bs_theme_simple_setup');





/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
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
            'before_widget' => '<div class="site-widget-item text-xs-center"><section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section></div> ',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }

endif;

add_action('widgets_init', 'wp_bs_theme_simple_widgets_init');






if (!function_exists('wp_bs_theme_simple_post_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own wp_bs_theme_simple_post_thumbnail() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function wp_bs_theme_simple_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <!-- post-thumbnail --> 
            <div class="post-thumbnail">   
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php the_post_thumbnail('full', array('alt' => the_title_attribute('echo=0'))); ?>
            </a>

        <?php
        endif; // End is_singular()
    }

endif;

if (!function_exists('wp_bs_theme_simple_excerpt')) :

    /**
     * Displays the optional excerpt.
     *
     * Wraps the excerpt in a div element.
     *
     * Create your own wp_bs_theme_simple_excerpt() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
     */
    function wp_bs_theme_simple_excerpt($class = 'entry-summary') {
        $class = esc_attr($class);

        if (has_excerpt() || is_search()) :
            ?>
            <div class="<?php echo $class; ?>">
                <?php the_excerpt(); ?>
            </div><!-- .<?php echo $class; ?> -->
            <?php
        endif;
    }














endif;
