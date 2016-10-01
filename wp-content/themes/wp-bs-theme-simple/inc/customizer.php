<?php

/**
 * WP-bs-theme-simple Theme Customizer 
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_bs_theme_simple_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
}

add_action('customize_register', 'wp_bs_theme_simple_customize_register');

function wp_bs_theme_simple_theme_customize_register($wp_customize) {

    $colors = array();
    $colors[] = array(
        'slug' => 'content_text_color',
        'default' => '#333',
        'label' => __('Content Text Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'content_link_color',
        'default' => '#88C34B',
        'label' => __('Content Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'content_background_color',
        'default' => '#0275d8',
        'label' => __('Content Background Color', 'wp-bs-theme-simple')
    );

    foreach ($colors as $color) {
        // SETTINGS
        $wp_customize->add_setting(
                $color['slug'], array(
            'default' => $color['default'],
            'type' => 'option',
            'capability' => 'edit_theme_options'
                )
        );
        // CONTROLS
        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                $wp_customize, $color['slug'], array(
            'label' => $color['label'],
            'section' => 'colors',
            'settings' => $color['slug'])
                )
        );
    }
}

add_action('customize_register', 'wp_bs_theme_simple_theme_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
//function wp_bs_theme_simple_customize_preview_js() {
//    wp_enqueue_script('wp_bs_theme_simple_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
//}
//
//add_action('customize_preview_init', 'wp_bs_theme_simple_customize_preview_js');
