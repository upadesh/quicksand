<?php

/**
 * Registers color schemes for Quicksand.
 *
 * Can be filtered with {@see 'quicksand_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color         - background_color
 * 2. Content Background Color      - qs_content_background_color
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
 * 22. Button Primary Color         - qs_button_color_primary
 * 23. Button Secondary Color       - qs_button_secondary_primary
 * 24. Tag Background Color         - qs_content_tag_background_color
 * 25. Tag Font Color               - qs_content_tag_font_color 
 * 26. Biography Background Color   - qs_biography_background_color
 * 27. Biography Font Color         - qs_biography_font_color
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
            'label' => __('Asteroid Blues', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' => 1,
                'qs_header_show_front' => 0,
                'qs_header_fullwidth' => 1,
                'qs_content_fullwidth' => 0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' => 1,
                'qs_content_masonry' => 0,
                'qs_content_use_lightgallery' => 1,
                'qs_slider_enabled' => 1,
                'qs_slider_fullwidth' => 1,
                'qs_header_enabled' => 1,
                'qs_slider_height' => 30,
                'qs_header_hide_when_slider_enabled' => 0,
                'qs_slider_margin_top' => 0,
                'quicksand_google_font' => 'Raleway',
                'qs_content_font_size' => 16,
                'qs_content_show_meta' => array(
                    'date',
                    'taxonomies',
                    'comments',
//                    'post-format',
//                    'author' 
                )
            ),
            'colors' => array(
                'background_color' => '#ffffff',
                'qs_content_background_color' => '#ffffff',
                'qs_content_link_color' => '#cecece',
                'qs_content_text_color' => '#686868',
                'qs_content_secondary_text_color' =>'#9ab7ac',
                'header_textcolor' => '#ffffff',
                'qs_nav_background_color' => '#9cbaba',
                'qs_nav_link_color' => '#ffffff',
                'qs_header_background_color' => '#95b2b1',
                'qs_footer_background_color' => '#303030',
                'qs_footer_link_color' => '#9ab7ac',
                'qs_footer_text_color' => '#5e7772',
                'qs_sidebar_background_color' => '#ffffff',
                'qs_sidebar_text_color' => '#666666',
                'qs_sidebar_link_color' => '#a3a3a3',
                'qs_sidebar_border_color' => '#f5f5f5',
                'qs_nav_link_hover_background_color' => '#95b2b1',
                'qs_footer_link_hover_color' => '#7c938a',
                'qs_content_post_bg_color' => '#ffffff',
                'qs_content_post_border_color' => '#e0e0e0',
                'qs_content_title_bg_color' => '#f5f5f5',
                'qs_button_color_primary' => '#9ab7ac',
                'qs_button_color_secondary' => '#fff',
                'qs_content_tag_background_color' => '#286584',
                'qs_content_tag_font_color' => '#fff',
                'qs_biography_background_color' => '#f5f5f5',
                'qs_biography_font_color' => '#686868',
            ),
        ),
        'jupiter-jazz' => array(
            'label' => __('Jupiter Jazz', 'quicksand'),
            'settings' => array(
                'qs_nav_fullwidth' => 0,
                'qs_header_show_front' => 0,
                'qs_header_fullwidth' => 0,
                'qs_content_fullwidth' => 0,
                'qs_biography_show' => 1,
                'qs_sidebar_border_width' => 3,
                'qs_content_masonry' => 1,
                'qs_content_use_lightgallery' => 0,
                'qs_slider_enabled' => 0,
                'qs_slider_fullwidth' => 0,
                'qs_header_enabled' => 1,
                'qs_slider_height' => 30,
                'qs_header_hide_when_slider_enabled' => 0,
                'qs_slider_margin_top' => 2,
                'quicksand_google_font' => 'Abel',
                'qs_content_font_size' => 16,
                'qs_content_show_meta' => array(
                    'date',
                    'taxonomies',
                    'comments',
                    'post-format',
                    'author'
                )
            ),
            'colors' => array(
                'background_color' => '#e0d4c0',
                'qs_content_background_color' => '#e0d4c0',
                'qs_content_link_color' => '#dbcfbc',
                'qs_content_text_color' => '#686868',
                'qs_content_secondary_text_color' => '#ffffff',
                'header_textcolor' => '#ffffff',
                'qs_nav_background_color' => '#e0d4c0',
                'qs_nav_link_color' => '#ffffff',
                'qs_header_background_color' => '#e0d4c0',
                'qs_footer_background_color' => '#303030',
                'qs_footer_link_color' => '#7e9688',
                'qs_footer_text_color' => '#dbdbdb',
                'qs_sidebar_background_color' => '#ffffff',
                'qs_sidebar_text_color' => '#686868',
                'qs_sidebar_link_color' => '#e0d4c0',
                'qs_sidebar_border_color' => '#e0d4c0',
                'qs_nav_link_hover_background_color' => '#ccbfaf',
                'qs_footer_link_hover_color' => '#dbdbdb',
                'qs_content_post_bg_color' => '#ffffff',
                'qs_content_post_border_color' => '#e0d4c0',
                'qs_content_title_bg_color' => '#d6cbb8',
                'qs_button_color_primary' => '#ada495',
                'qs_button_color_secondary' => '#fff',
                'qs_content_tag_background_color' => '#286584',
                'qs_content_tag_font_color' => '#fff',
                'qs_biography_background_color' => '#fff',
                'qs_biography_font_color' => '#000',
            ),
        ),
    ));
}
