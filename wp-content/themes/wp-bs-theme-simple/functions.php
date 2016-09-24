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
        wp_enqueue_style('wp-bs-theme-simple', get_stylesheet_uri());
        // Theme stylesheet.
        wp_enqueue_style('wp-bs-theme-simple2', get_template_directory_uri() . '/css/wp-bs-theme-simple.min.css', array());
    }

endif;
add_action('wp_enqueue_scripts', 'wp_bs_theme_simple_styles');





if (!function_exists('wp_bs_theme_simple_setup')) :

    function wp_bs_theme_simple_setup() {
        add_theme_support('custom-background', array(
            'default-color' => 'ffffff',
        ));

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

//        register_nav_menus(array(
//            'main_menu' => __('Main Menu', 'bootstrap-four'),
//                // 'footer_menu' => 'Footer Menu'
//        ));
//        add_editor_style('css/bootstrap.min.css');
    }

endif; // wp_bs_theme_simple_setup
add_action('after_setup_theme', 'wp_bs_theme_simple_setup');
