<?php
/**
 * WP-bs-theme-simple Theme Customizer 
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 */

/**
 * Binds the JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 * @since WP-bs-theme-simple1.0
 */
function wp_bs_theme_simple_customize_control_js() {
    wp_enqueue_script('color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array('customize-controls', 'iris', 'underscore', 'wp-util'), 'wp-bs-theme-simple', true);
    wp_localize_script('color-scheme-control', 'colorScheme', wp_bs_theme_simple_get_color_schemes());
}

add_action('customize_controls_enqueue_scripts', 'wp_bs_theme_simple_customize_control_js');

/**
 * Binds JS handlers to the customizer preview 
 *
 * @since WP-bs-theme-simple1.0
 */
function wp_bs_theme_simple_customize_preview_js() {
    wp_enqueue_script('wp-bs-theme-simple-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('customize-preview'), 'wp-bs-theme-simple', true);
}

add_action('customize_preview_init', 'wp_bs_theme_simple_customize_preview_js');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @see https://codex.wordpress.org/Theme_Customization_API
 * 
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wp_bs_theme_simple_customize_register($wp_customize) {
    // build-in 
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Section: Colors  
    /*
     *  Add color scheme 
     * Right now it only updates the 7 defined colors ... no extra css is loaded
     * 
     * @see http://www.deluxeblogtips.com/2016/01/add-color-schemes-wordpress-theme.html 
     */
    $wp_customize->add_setting('color_scheme', array(
        'default' => 'default',
        'sanitize_callback' => 'wp_bs_theme_simple_sanitize_color_scheme',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('color_scheme', array(
        'label' => __('Base Color Scheme', 'wp-bs-theme-simple'),
        'section' => 'colors',
        'type' => 'select',
        'choices' => wp_bs_theme_simple_get_color_scheme_choices(),
        'priority' => 1,
    ));

    $colorSchemeDefault = wp_bs_theme_simple_get_color_schemes()['default']['colors'];
    $colors = array();
    $colors[] = array(
        'slug' => 'wbts_header_background_color',
        'default' => $colorSchemeDefault[8],
        'label' => __('Header Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_background_content_color',
        'default' => $colorSchemeDefault[1],
        'label' => __('Content Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_link_color',
        'default' => $colorSchemeDefault[2],
        'label' => __('Content Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_main_text_color',
        'default' => $colorSchemeDefault[3],
        'label' => __('Content Text Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_secondary_text_color',
        'default' => $colorSchemeDefault[4],
        'label' => __('Secondary Text Color', 'wp-bs-theme-simple')
    ); 
    $colors[] = array(
        'slug' => 'wbts_nav_background_color',
        'default' => $colorSchemeDefault[6],
        'label' => __('Navbar Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_nav_link_color',
        'default' => $colorSchemeDefault[7],
        'label' => __('Navbar Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_footer_background_color',
        'default' => $colorSchemeDefault[9],
        'label' => __('Footer Background Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_footer_link_color',
        'default' => $colorSchemeDefault[10],
        'label' => __('Footer Link Color', 'wp-bs-theme-simple')
    );
    $colors[] = array(
        'slug' => 'wbts_footer_text_color',
        'default' => $colorSchemeDefault[11],
        'label' => __('Footer Text Color', 'wp-bs-theme-simple')
    );

    foreach ($colors as $color) {
        $wp_customize->add_setting(
                $color['slug'], array(
            'default' => $color['default'],
            'transport' => 'postMessage',
                )
        );

        $wp_customize->add_control(
                new WP_Customize_Color_Control(
                $wp_customize, $color['slug'], array(
            'label' => $color['label'],
            'section' => 'colors',
            'settings' => $color['slug'])
                )
        );
    }


    // Section: Theme  
    $wp_customize->add_section('wp_bs_theme_simple_theme', array(
        'title' => __('Theme Options', 'wp-bs-theme-simple'),
        'priority' => 35,
    ));

    $wp_customize->add_setting("wp_bs_theme_simple_nav_fullwidth", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('wp_bs_theme_simple_nav_fullwidth', array(
        'label' => __("Navigation Fullwidth:", 'wp-bs-theme-simple'),
        'section' => 'wp_bs_theme_simple_theme',
        'type' => 'checkbox',
        'settings' => 'wp_bs_theme_simple_nav_fullwidth',
        'priority' => 12,
    ));

    $wp_customize->add_setting("wp_bs_theme_simple_header_fullwidth", array(
        'type' => 'theme_mod',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('wp_bs_theme_simple_header_fullwidth', array(
        'label' => __("Header Fullwidth:", 'wp-bs-theme-simple'),
        'section' => 'wp_bs_theme_simple_theme',
        'type' => 'checkbox',
        'settings' => 'wp_bs_theme_simple_header_fullwidth',
        'priority' => 12,
    ));
}

add_action('customize_register', 'wp_bs_theme_simple_customize_register');

/**
 * integrate a scoial-media-menu
 * 
 * @see https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 * 
 * @return string
 */
function wp_bs_theme_simple_social_media_array() {
    /* store social site names in array */
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

    return $social_sites;
}

function wp_bs_theme_simple_add_social_sites_customizer($wp_customize) {

    $wp_customize->add_section('wp_bs_theme_simple_social_settings', array(
        'title' => __('Social Media Icons', 'text-domain'),
        'priority' => 35,
    ));

    $social_sites = wp_bs_theme_simple_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'text-domain'),
            'section' => 'wp_bs_theme_simple_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'wp_bs_theme_simple_add_social_sites_customizer');


/*
 * template-tag:
 * 
 * takes user input from the customizer and outputs linked social media icons 
 */

function wp_bs_theme_simple_social_media_icons() {

    $social_sites = wp_bs_theme_simple_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }

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
                            <i class="fa fa-envelope fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
            <?php } else { ?> 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo esc_attr($class); ?> fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
                <?php
            }
        }
        echo "</ul>";
    }
}

/**
 * Registers color schemes for WP-bs-theme-simple.
 *
 * Can be filtered with {@see 'wp_bs_theme_simple_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color         - background_color
 * 2. Page Background Color         - wbts_background_content_color
 * 3. Link Color                    - wbts_link_color
 * 4. Main Text Color.              - wbts_main_text_color
 * 5. Secondary Text Color          - wbts_secondary_text_color
 * 6. Header Text Color             - header_textcolor
 * 7. Navigation Background Color   - wbts_nav_background_color
 * 8. Navigation Link Color         - wbts_nav_link_color
 * 6. Header Background Color       - header_textcolor
 * 9. Footer Background Color       - wbts_footer_background_color
 * 10. Footer Link Color            - wbts_footer_link_color
 * 11. Footer Text Color            - wbts_footer_text_color
 *
 * @since WP-bs-theme-simple 0.0.1
 *
 * @return array An associative array of color scheme options.
 */
function wp_bs_theme_simple_get_color_schemes() {
    /**
     * Filter the color schemes registered for use with WP-bs-theme-simple.
     *
     * The default schemes include 'default', 'quicksand' 
     * Adjust your CSS-below
     *
     * @since WP-bs-theme-simple 0.0.1
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
    return apply_filters('wp_bs_theme_simple_color_schemes', array(
        'default' => array(
            'label' => __('Default', 'wp-bs-theme-simple'),
            'colors' => array(
                '#ffffff', 
                '#ffffff',
                '#cecece',
                '#686868',
                '#2cb5b1',
                '#ffffff',
                '#2cb5b1',
                '#ffffff',
                '#2cb5b1',
                '#4f4f4f',
                '#2cb5b1',
                '#d1d1d1',
            ),
        ),
        'quicksand' => array(
            'label' => __('Quicksand', 'wp-bs-theme-simple'),
            'colors' => array(
                '#dd9933',
                '#f2d976',
                '#a33e25',
                '#84401e',
                '#680404',
                '#dd9933',
                '#f2d976',
                '#84401e',
                '#f2d976',
                '#510000',
                '#dd9933',
                '#a33e25',
            ),
        ), 
    ));
}

if (!function_exists('wp_bs_theme_simple_get_color_scheme')) :

    /**
     * Retrieves the current WP-bs-theme-simple color scheme.
     *
     * Create your own wp_bs_theme_simple_get_color_scheme() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @return array An associative array of either the current or default color scheme HEX values.
     */
    function wp_bs_theme_simple_get_color_scheme() {
        $color_scheme_option = get_theme_mod('color_scheme', 'default');
        $color_schemes = wp_bs_theme_simple_get_color_schemes();

        if (array_key_exists($color_scheme_option, $color_schemes)) {
            return $color_schemes[$color_scheme_option]['colors'];
        }

        return $color_schemes['default']['colors'];
    }

endif; // wp_bs_theme_simple_get_color_scheme

if (!function_exists('wp_bs_theme_simple_get_color_scheme_choices')) :

    /**
     * Retrieves an array of color scheme choices registered for WP-bs-theme-simple.
     *
     * Create your own wp_bs_theme_simple_get_color_scheme_choices() function to override
     * in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @return array Array of color schemes.
     */
    function wp_bs_theme_simple_get_color_scheme_choices() {
        $color_schemes = wp_bs_theme_simple_get_color_schemes();
        $color_scheme_control_options = array();

        foreach ($color_schemes as $color_scheme => $value) {
            $color_scheme_control_options[$color_scheme] = $value['label'];
        }

        return $color_scheme_control_options;
    }

endif; // wp_bs_theme_simple_get_color_scheme_choices


if (!function_exists('wp_bs_theme_simple_sanitize_color_scheme')) :

    /**
     * Handles sanitization for WP-bs-theme-simple color schemes.
     *
     * Create your own wp_bs_theme_simple_sanitize_color_scheme() function to override
     * in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @param string $value Color scheme name value.
     * @return string Color scheme name.
     */
    function wp_bs_theme_simple_sanitize_color_scheme($value) {
        $color_schemes = wp_bs_theme_simple_get_color_scheme_choices();

        if (!array_key_exists($value, $color_schemes)) {
            return 'default';
        }

        return $value;
    }

 
    
endif; // wp_bs_theme_simple_sanitize_color_scheme
 