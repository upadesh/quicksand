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
    $colorSchemeDefault = quicksand_get_color_schemes()['default']['colors'];

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
        'type' => 'theme_mod',
        'transport' => 'refresh', 
        'sanitize_callback' => 'quicksand_sanitize_checkbox',
    ));

    $wp_customize->add_control('quicksand_nav_fullwidth', array(
        'label' => __("Navigation Fullwidth", 'quicksand'),
        'section' => 'quicksand_nav',
        'type' => 'checkbox',
        'settings' => 'qs_nav_fullwidth',
        'priority' => 10,
    ));

    // link-color
    $wp_customize->add_setting('qs_nav_link_color', array(
        'default' => $colorSchemeDefault[7],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_nav_link_color', array(
        'label' => __('Navbar Link Color', 'quicksand'),
//        'description' => __('Default used if no color is selected', 'quicksand'),
        'section' => 'quicksand_nav',
        'settings' => 'qs_nav_link_color'
    )));

    // bg-color
    $wp_customize->add_setting('qs_nav_background_color', array(
        'default' => $colorSchemeDefault[6],
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

    // fullwidth
    $wp_customize->add_setting("qs_header_fullwidth", array(
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
        'default' => $colorSchemeDefault[8],
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
        'default' => $colorSchemeDefault[1],
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
        'default' => $colorSchemeDefault[2],
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
        'default' => $colorSchemeDefault[3],
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
        'default' => $colorSchemeDefault[4],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_content_secondary_text_color', array(
        'label' => __('Secondary Text Color', 'quicksand'),
        'section' => 'quicksand_content',
        'settings' => 'qs_content_secondary_text_color'
    )));


    /* Section: Footer */
    $wp_customize->add_section('quicksand_footer', array(
        'title' => __('Footer', 'quicksand'),
        'priority' => 40,
        'panel' => 'quicksand_main_options',
    ));

    // bg-color
    $wp_customize->add_setting('qs_footer_background_color', array(
        'default' => $colorSchemeDefault[9],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_background_color', array(
        'label' => __('Footer Background Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_background_color'
    )));

    // link-color
    $wp_customize->add_setting('qs_footer_link_color', array(
        'default' => $colorSchemeDefault[10],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_link_color', array(
        'label' => __('Footer Link Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_link_color'
    )));

    // text-color
    $wp_customize->add_setting('qs_footer_text_color', array(
        'default' => $colorSchemeDefault[11],
        'transport' => 'postMessage',
        'sanitize_callback' => 'quicksand_sanitize_hexcolor'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'qs_footer_text_color', array(
        'label' => __('Footer Text Color', 'quicksand'),
        'section' => 'quicksand_footer',
        'settings' => 'qs_footer_text_color'
    )));
    
    


    /* Default WordPress Theme Customization */
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    
    // move header-text-color to Theme-Options-Section 'Header'
    $wp_customize->get_control('header_textcolor' )->section = 'quicksand_header';
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
            'colors' => array(
                '#ffffff',
                '#ffffff',
                '#cecece',
                '#686868',
                '#2cb5b1',
                '#ffffff',
                '#2dbfbf',
                '#ffffff',
                '#2cb5b1',
                '#4f4f4f',
                '#2cb5b1',
                '#d1d1d1',
            ),
        ),
//        https://www.mediaevent.de/tutorial/farbcodes.html
        'dune' => array(
            'label' => __('Dune', 'quicksand'),
            'colors' => array(
                '#faebd7',
                '#faebd7',
                '#deb887',
                '#997760',
                '#ba9a75',
                '#e8d8c7',
                '#a38566',
                '#faebd7',
                '#ba9a75',
                '#ba9a75',
                '#e8c892',
                '#91745b',
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
            return $color_schemes[$color_scheme_option]['colors'];
        }

        return $color_schemes['default']['colors'];
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
            'label' => $social_site ."url:",
            'section' => 'quicksand_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'quicksand_add_social_sites_customizer');




function quicksand_get_active_social_sites() {
    $active_sites = array();
    $social_sites = quicksand_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
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
