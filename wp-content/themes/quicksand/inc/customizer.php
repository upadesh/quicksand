<?php
/**
 * Quicksand Theme Customizer 
 *
 * @since Quicksand 0.2.1
 *
 */

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since Quicksand1.0
 */
function quicksand_customize_control_js() {
    wp_enqueue_script('color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), 'quicksand', true);
    wp_localize_script('color-scheme-control', 'colorScheme', quicksand_get_color_schemes());
}

add_action('customize_controls_enqueue_scripts', 'quicksand_customize_control_js');

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Quicksand1.0
 */
function quicksand_customize_preview_js() {
    wp_enqueue_script('quicksand-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview'), 'quicksand', true);
}

add_action('customize_preview_init', 'quicksand_customize_preview_js');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @see https://codex.wordpress.org/Theme_Customization_API
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function quicksand_customize_register($wp_customize) {

    /* Main option Settings Panel */
    $wp_customize->add_panel('quicksand_main_options', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Theme Options', 'quicksand'),
        'description' => __('Panel to update theme options', 'quicksand'), // Include html tags such as <p>.
    ));



    /**
     *  Section: Color Schemes
     * 
     * @see http://www.deluxeblogtips.com/2016/01/add-color-schemes-wordpress-theme.html 
     */
    // get default-values  
    
    $color_scheme_option = get_theme_mod('color_scheme', 'default');  
//    $colorSchemeDefault['colors'] = quicksand_get_color_schemes()['default']['colors'];
    $colorSchemeDefault = quicksand_get_color_schemes()[$color_scheme_option];

    $wp_customize->add_section('quicksand_color_schemes', array(
        'title' => __('Color Schemes', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    $wp_customize->add_setting('color_scheme', array(
        'default' => 'default',
        'sanitize_callback' => 'quicksand_sanitize_color_scheme',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('color_scheme', array(
        'label' => __('Color Schemes', 'quicksand'),
        'section' => 'quicksand_color_schemes',
        'type' => 'select',
        'choices' => quicksand_get_color_scheme_choices(),
        'priority' => 1,
    ));

    /* Section: Navigation */
    $wp_customize->add_section('quicksand_nav', array(
        'title' => __('Navigation', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    // fullwidth
    $wp_customize->add_setting("qs_nav_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_nav_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_nav_fullwidth', array(
        'label' => __("Navigation Fullwidth", 'quicksand'),
        'section' => 'quicksand_nav',
        'type' => 'checkbox',
        'settings' => 'qs_nav_fullwidth',
        'priority' => 10,
    ));

    // link-color
    $wp_customize->add_setting('qs_nav_link_color', array(
        'default' => $colorSchemeDefault['colors'][7],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_link_color', array(
        'label' => __('Navbar Link Color', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_link_color'
    )));

    // link-hover-color
    $wp_customize->add_setting('qs_nav_link_hover_background_color', array(
        'default' => $colorSchemeDefault['colors'][16],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_link_hover_background_color', array(
        'label' => __('Navbar Link Hover Background Color', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_link_hover_background_color'
    )));


    // bg-color
    $wp_customize->add_setting('qs_nav_background_color', array(
        'default' => $colorSchemeDefault['colors'][6],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_background_color', array(
        'label' => __('Navbar Background Color', 'quicksand'),
//        'description' => __('Default used if no color is selected', 'quicksand'), 
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_background_color'
    )));



    /* Section: Header */
    $wp_customize->add_section('quicksand_header', array(
        'title' => __('Header', 'quicksand'),
        'priority' => 20,
        'panel' => 'quicksand_main_options',
    ));

    // show only on front
    $wp_customize->add_setting("qs_header_show_front", array(
        'default' => $colorSchemeDefault['settings']['qs_header_show_front'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_header_show_front', array(
        'label' => __("Show only on front-page", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_show_front',
        'priority' => 1,
    ));

    // fullwidth
    $wp_customize->add_setting("qs_header_fullwidth", array(
        'default' => $colorSchemeDefault['settings']['qs_header_fullwidth'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('quicksand_header_fullwidth', array(
        'label' => __("Header Fullwidth", 'quicksand'),
        'section' => 'quicksand_header',
        'type' => 'checkbox',
        'settings' => 'qs_header_fullwidth',
        'priority' => 1,
    ));


    // bg-color
    $wp_customize->add_setting('qs_header_background_color', array(
        'default' => $colorSchemeDefault['colors'][8],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_header_background_color', array(
        'label' => __('Header Background Color', 'quicksand'),
        'description' => __('Default used if no color is selected', 'quicksand'),
        'section' => 'quicksand_header',
        'settings' => 'qs_header_background_color'
    )));




    /* Section: Content */
    $wp_customize->add_section('quicksand_content', array(
        'title' => __('Content', 'quicksand'),
        'priority' => 30,
        'panel' => 'quicksand_main_options',
    )); 

    // bg-color
    $wp_customize->add_setting('qs_content_background_color', array(
        'default' => $colorSchemeDefault['colors'][1],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_background_color', array(
        'label' => __('Content Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_background_color'
    )));

    // link-color
    $wp_customize->add_setting('qs_content_link_color', array(
        'default' => $colorSchemeDefault['colors'][2],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_link_color', array(
        'label' => __('Content Link Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_link_color'
    )));


    // text-color
    $wp_customize->add_setting('qs_content_text_color', array(
        'default' => $colorSchemeDefault['colors'][3],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_text_color', array(
        'label' => __('Content Text Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_text_color'
    )));

    // 2nd-text-color
    $wp_customize->add_setting('qs_content_secondary_text_color', array(
        'default' => $colorSchemeDefault['colors'][4],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_secondary_text_color', array(
        'label' => __('Secondary Text Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_secondary_text_color'
    )));

    // title-background
    $wp_customize->add_setting('qs_content_title_bg_color', array(
        'default' => $colorSchemeDefault['colors'][20],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_title_bg_color', array(
        'label' => __('Title Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_title_bg_color'
    )));

    // post background color
    $wp_customize->add_setting('qs_content_post_bg_color', array(
        'default' => $colorSchemeDefault['colors'][18],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_post_bg_color', array(
        'label' => __('Post Background Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_post_bg_color'
    )));

    // post border color
    $wp_customize->add_setting('qs_content_post_border_color', array(
        'default' => $colorSchemeDefault['colors'][19],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_post_border_color', array(
        'label' => __('Post Border Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_post_border_color'
    )));




    /* Section: Biography */
    $wp_customize->add_section('quicksand_biography', array(
        'title' => __('Biography', 'quicksand'),
        'priority' => 10,
        'panel' => 'quicksand_main_options',
    ));

    // visible
    $wp_customize->add_setting("qs_biography_show", array(
        'default' => $colorSchemeDefault['settings']['qs_biography_show'],
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('qs_biography_show', array(
        'label' => __("Show Author Biography", 'quicksand'),
        'section' => 'quicksand_biography',
        'type' => 'checkbox',
        'settings' => 'qs_biography_show',
        'priority' => 10,
    ));




    /* Section: Sidebar */
    $wp_customize->add_section('quicksand_sidebar', array(
        'title' => __('Sidebar', 'quicksand'),
        'priority' => 30,
        'panel' => 'quicksand_main_options',
    ));

    // bg-color
    $wp_customize->add_setting('qs_sidebar_background_color', array(
        'default' => $colorSchemeDefault['colors'][12],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_background_color', array(
        'label' => __('Widget Background Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_background_color'
    )));

    // color
    $wp_customize->add_setting('qs_sidebar_text_color', array(
        'default' => $colorSchemeDefault['colors'][13],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_text_color', array(
        'label' => __('Widget Text Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_text_color'
    )));

    // link
    $wp_customize->add_setting('qs_sidebar_link_color', array(
        'default' => $colorSchemeDefault['colors'][14],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_link_color', array(
        'label' => __('Widget Link Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'settings' => 'qs_sidebar_link_color'
    )));

    // border
    $wp_customize->add_setting('qs_sidebar_border_color', array(
        'default' => $colorSchemeDefault['colors'][15],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    
    
    $bgColorContent = get_theme_mod('qs_content_background_color');
    $bgContent = isset($bgColorContent) ? $bgColorContent : $colorSchemeDefault['colors'][1];
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_sidebar_border_color', array(
        'label' => __('Widget Border Color', 'quicksand'),
        'section' => 'quicksand_sidebar',
        'description' => __('For a nice effect choose the same color like Content-Background ('.$bgContent.') ...', 'quicksand'),
        'settings' => 'qs_sidebar_border_color'
    )));

    $wp_customize->add_setting('qs_sidebar_border_width', array(
        'default' => $colorSchemeDefault['settings']['qs_sidebar_border_width'],
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('qs_sidebar_border_width', array(
        'type' => 'range',
        'priority' => 10,
        'section' => 'quicksand_sidebar',
        'label' => __('Border width', 'quicksand'),
        'description' => __('... and set the border-width higher than 1', 'quicksand'),
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'class' => 'sidebar-border-width-slider-class',
            'style' => 'color: #0a0',
        ),
    ));






    /* Section: Footer */
    $wp_customize->add_section('quicksand_footer', array(
        'title' => __('Footer', 'quicksand'),
        'priority' => 40,
        'panel' => 'quicksand_main_options',
    ));

    // bg-color
    $wp_customize->add_setting('qs_footer_background_color', array(
        'default' => $colorSchemeDefault['colors'][9],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_background_color', array(
        'label' => __('Footer Background Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_background_color'
    )));

    // text-color
    $wp_customize->add_setting('qs_footer_text_color', array(
        'default' => $colorSchemeDefault['colors'][11],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_text_color', array(
        'label' => __('Footer Text Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_text_color'
    )));

    // link-color
    $wp_customize->add_setting('qs_footer_link_color', array(
        'default' => $colorSchemeDefault['colors'][10],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_link_color', array(
        'label' => __('Footer Link Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_link_color'
    )));

    // link-hover-color
    $wp_customize->add_setting('qs_footer_link_hover_color', array(
        'default' => $colorSchemeDefault['colors'][17],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_link_hover_color', array(
        'label' => __('Footer Link Hover Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_link_hover_color'
    )));






    /* Default WordPress Theme Customization */
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // move header-text-color to Theme-Options-Section 'Header'
    $wp_customize->get_control('header_textcolor')->section = 'quicksand_header';
    
    // move page-bg-color to Theme-Options-Section 'Content'
    $wp_customize->get_control('background_color')->section = 'quicksand_content';
}

add_action('customize_register', 'quicksand_customize_register');

/**
 * Registers color schemes for Quicksand.
 *
 * Can be filtered with {@see 'quicksand_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color         - background_color
 * 2. Page Background Color         - qs_content_background_color
 * 3. Link Color                    - qs_content_link_color
 * 4. Content Text Color            - qs_content_text_color
 * 5. Secondary Text Color          - qs_content_secondary_text_color
 * 6. Header Text Color             - header_textcolor
 * 7. Navigation Background Color   - qs_nav_background_color
 * 8. Navigation Link Color         - qs_nav_link_color
 * 9. Header Background Color       - qs_header_background_color
 * 10. Footer Background Color      - qs_footer_background_color
 * 11. Footer Link Color            - qs_footer_link_color
 * 12. Footer Text Color            - qs_footer_text_color
 * 13. Sidebar Background Color     - qs_sidebar_background_color
 * 14. Sidebar Text Color           - qs_sidebar_text_color
 * 15. Sidebar Link Color           - qs_sidebar_link_color
 * 16. Sidebar Border Color         - qs_sidebar_border_color
 * 17. Navigation Link Hover Color  - qs_nav_link_hover_background_color
 * 18. Footer Link Hover Color      - qs_footer_link_hover_color
 * 19. Post Background Color        - qs_content_post_bg_color
 * 20. Post Border Color            - qs_content_post_border_color
 * 21. Post Title Background Color  - qs_content_title_bg_color
 *
 * @since Quicksand 0.2.1
 *
 * @return array An associative array of color scheme options.
 */
function quicksand_get_color_schemes() {
    /**
     * Filter the color schemes registered for use with Quicksand.
     *
     * The default schemes include 'default', 'quicksand' 
     * Adjust your CSS-below
     *
     * @since Quicksand 0.2.1
     *
     * @param array $schemes {
     *     Associative array of color schemes data.
     *
     *     @type array $slug {
     *         Associative array of information for setting up the color scheme.
     *
     *         @type string $label  Color scheme label.
     *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
     *                              Colors are defined in the following order: Main background, page
     *                              background, link, main text, secondary text.
     *     }
     * }
     */
    return apply_filters('quicksand_color_schemes', array(
        'default' => array(
            'label' => __('Default', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' =>1,
                'qs_header_show_front' =>0,
                'qs_header_fullwidth' =>1,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' =>1,
            ),
            'colors' => array(
//                background_color
                '#ffffff',
//                qs_content_background_color
                '#ffffff',
//                qs_content_link_color
                '#cecece',
//                qs_content_text_color
                '#686868',
//                qs_content_secondary_text_color
                '#9ab7ac',
//                header_textcolor
                '#ffffff',
//                qs_nav_background_color
                '#9cbaba',
//                qs_nav_link_color
                '#ffffff',
//                qs_header_background_color
                '#95b2b1',
//                qs_footer_background_color
                '#303030',
//                qs_footer_link_color
                '#9ab7ac',
//                qs_footer_text_color
                '#5e7772',
//                qs_sidebar_background_color
                '#ffffff',
//                qs_sidebar_text_color
                '#666666',
//                qs_sidebar_link_color
                '#a3a3a3',
//                qs_sidebar_border_color
                '#f5f5f5',
//                qs_nav_link_hover_background_color
                '#95b2b1',
//                qs_footer_link_hover_color           
                '#7c938a',
//                qs_content_post_bg_color 
                '#ffffff',
//                qs_content_post_border_color 
                '#e0e0e0',
//                qs_content_title_bg_color
                '#f5f5f5',
            ),
        ),
//        https://www.mediaevent.de/tutorial/farbcodes.html
        'dune' => array(
            'label' => __('Dune', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' =>0,
                'qs_header_show_front' =>1,
                'qs_header_fullwidth' =>0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' =>3,
            ),
            'colors' => array(
//                background_color
                '#e0d4c0',
//                qs_content_background_color
                '#e0d4c0',
//                qs_content_link_color
                '#dbcfbc',
//                qs_content_text_color
                '#686868',
//                qs_content_secondary_text_color
                '#ffffff',
//                header_textcolor
                '#ffffff',
//                qs_nav_background_color
                '#e0d4c0',
//                qs_nav_link_color
                '#ffffff',
//                qs_header_background_color
                '#e0d4c0',
//                qs_footer_background_color
                '#303030',
//                qs_footer_link_color
                '#7e9688',
//                qs_footer_text_color
                '#dbdbdb',
//                qs_sidebar_background_color
                '#ffffff',
//                qs_sidebar_text_color
                '#686868',
//                qs_sidebar_link_color
                '#e0d4c0',
//                qs_sidebar_border_color
                '#e0d4c0',
//                qs_nav_link_hover_background_color
                '#ccbfaf',
//                qs_footer_link_hover_color           
                '#dbdbdb',
//                qs_content_post_bg_color 
                '#ffffff',
//                qs_content_post_border_color 
                '#e0d4c0',
//                qs_content_title_bg_color
                '#d6cbb8',
            ),
        ),
    ));
}

if (!function_exists('quicksand_get_color_scheme')) :

    /**
     * Retrieves the current Quicksand color scheme.
     *
     * Create your own quicksand_get_color_scheme() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @return array An associative array of either the current or default color scheme HEX values.
     */
    function quicksand_get_color_scheme() {
        $color_scheme_option = get_theme_mod('color_scheme', 'default');
        $color_schemes = quicksand_get_color_schemes();

        if (array_key_exists($color_scheme_option, $color_schemes)) {
            return $color_schemes[$color_scheme_option];
        }

        return $color_schemes['default'];
    }

endif; // quicksand_get_color_scheme

if (!function_exists('quicksand_get_color_scheme_choices')) :

    /**
     * Retrieves an array of color scheme choices registered for Quicksand.
     *
     * Create your own quicksand_get_color_scheme_choices() function to override
     * in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @return array Array of color schemes.
     */
    function quicksand_get_color_scheme_choices() {
        $color_schemes = quicksand_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }

        return $color_scheme_control_options;
    }

endif; // quicksand_get_color_scheme_choices


if (!function_exists('quicksand_sanitize_color_scheme')) :

    /**
     * Handles sanitization for Quicksand color schemes.
     *
     * Create your own quicksand_sanitize_color_scheme() function to override
     * in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $value Color scheme name value.
     * @return string Color scheme name.
     */
    function quicksand_sanitize_color_scheme($value) {
        $color_schemes = quicksand_get_color_scheme_choices();

        if (!array_key_exists($value, $color_schemes)) {
            return 'default';
        }

        return $value;
    }

endif; // quicksand_sanitize_color_scheme




if (!function_exists('quicksand_sanitize_checkbox')) :

    /**
     * Sanitzie checkbox for WordPress customizer
     */
    function quicksand_sanitize_checkbox($input) {
        if ($input == 1) {
            return 1;
        } else {
            return '';
        }
    }

endif; // quicksand_sanitize_color_scheme


if (!function_exists('quicksand_sanitize_hexcolor')) :

    /**
     * Adds sanitization callback function: colors
     * @package Quicksand
     */
    function quicksand_sanitize_hexcolor($color) {
        if ($unhashed = sanitize_hex_color_no_hash($color))
            return '#' . $unhashed;
        return $color;
    }

endif; // quicksand_sanitize_color_scheme

/**
 * integrate a scoial-media-menu
 * 
 * @see https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 * 
 * @return string
 */
function quicksand_social_media_array() {
    /* store social site names in array */
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

    return $social_sites;
}

function quicksand_add_social_sites_customizer($wp_customize) {

    $wp_customize->add_section('quicksand_social_settings', array(
        'title' => __('Social Media Icons', 'quicksand'),
        'priority' => 35,
    ));

    $social_sites = quicksand_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => $social_site . "url:",
            'section' => 'quicksand_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'quicksand_add_social_sites_customizer');

/**
 * returns all active social sites
 * 
 * @return type mixed
 */
function quicksand_get_active_social_sites() {
    $active_sites = array();
    $social_sites = quicksand_social_media_array();

    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }

    return $active_sites;
}

/*
 * template-tag:
 * 
 * takes user input from the customizer and outputs linked social media icons 
 */

function quicksand_social_media_icons() {

    $active_sites = quicksand_get_active_social_sites();

    /* for each active social site, add it as a list item */
    if (!empty($active_sites)) {
        echo '<ul class="list-inline">';

        foreach ($active_sites as $active_site) {

            /* setup the class */
            $class = 'fa fa-' . $active_site;

            if ($active_site == 'email') {
                ?>                 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'quicksand'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
            <?php } else { ?> 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo esc_attr($class); ?> fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'quicksand'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
                <?php
            }
        }
        echo "</ul>";
    }
}
