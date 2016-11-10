<?php
if (!function_exists('quicksand_customizer_css')) :

    /**
     * include customizer-settings in new style-script
     * triggered after wp_enque_script
     */
    function quicksand_customizer_css() {

        $colorScheme = quicksand_get_color_scheme();
        ?>

        <style type="text/css">   

            body,html {
                font-size: <?php echo get_theme_mod('qs_content_font_size', quicksand_get_color_scheme()['settings']['qs_content_font_size']); ?>px;

                /*only include google-font if api-key is present & font is selected*/
                <?php if (get_theme_mod('qs_content_google_api_key', FALSE) && get_theme_mod('quicksand_google_font', FALSE)) { ?>
                    font-family: '<?php echo get_theme_mod('quicksand_google_font', quicksand_get_color_scheme()['settings']['quicksand_google_font']); ?>', sans-serif;
                <?php } ?> 
            }

            /* buttons */ 
            /*form-buttons*/

            /* TODO: hat kein btn-klasse, ist aber extended
             * hover geht auch noch nicht 
             * dasslebe sollte auch mit den Kommenta_Antworten funktionieren
            */ 


            /*btn-secondary*/
            .btn-secondary {
                background-color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                border: 1px solid <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
                outline: none;
            }

            .btn-secondary:hover 
            /*            .btn-secondary:focus, 
                        .btn-secondary.focus, 
                        .btn-secondary:active, 
                        .btn-secondary.active, 
                        .btn-secondary:visited,
                        .btn-secondary:active:hover, 
                        .btn-secondary.active:hover */
            {   
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
                border: 1px solid <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                outline: none;
            }




            /*btn-outline-secondary*/ 
/*            .comment a.comment-reply-link, 

            .comment-navigation .nav-previous a,
            .comment-navigation .nav-next a, */
            
             
            /*btn-outline-secondary: normal*/
            .btn-outline-secondary 
            { 
                background: transparent;
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
                border: 1px solid <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
            }

            .btn-outline-secondary a {   
                background: transparent; 
                border: none;
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
            }  

            /*btn-outline-secondary: hover*/
            .btn-outline-secondary:hover,
            .btn-outline-secondary:hover a
            { 
                outline: none;
                text-decoration: none; 
                background: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                border: 1px solid <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
            } 




            /*navigation*/
            .site-navigation,
            .site-nav-container nav.navbar,
            .site-nav-container nav.navbar .navbar-toggler,
            .site-nav-container .dropdown-menu {
                background: <?php echo get_theme_mod('qs_nav_background_color', $colorScheme['colors'][6]); ?>;
            }

            .site-nav-container,
            .site-nav-container .menu-item .nav-link , 
            .site-nav-container .menu-item .dropdown-item,    
            .site-nav-container nav.navbar .navbar-toggler,
            .navbar-light .navbar-nav .nav-link,
            .navbar-light .navbar-nav .active .nav-link:hover,
            .navbar-light .navbar-nav .nav-link:hover,
            .navbar-light .navbar-nav .nav-link:focus,
            .navbar-light .navbar-nav .nav-link:active,  
            .navbar-light .navbar-nav .nav-link:visited,  
            .navbar-light .navbar-nav .open>.nav-link,
            .navbar-light .navbar-nav .open>.nav-link:hover,
            .navbar-light .navbar-nav .open>.nav-link:visited,
            .navbar-light .navbar-nav .open>.nav-link:focus,
            .navbar-light .navbar-nav .open>.nav-link:active {
                color: <?php echo get_theme_mod('qs_nav_link_color', $colorScheme['colors'][7]); ?>;
            }  

            .site-nav-container .menu-item .dropdown-item.active { 
                background: <?php echo get_theme_mod('qs_nav_link_hover_background_color', $colorScheme['colors'][16]); ?>;
            }


            .site-nav-container .menu-item .dropdown-item:hover {
                background: <?php echo get_theme_mod('qs_nav_link_hover_background_color', $colorScheme['colors'][16]); ?>;
            } 


            /*slider*/
            .quicksand-slider-header-wrapper {
                margin-top: <?php echo get_theme_mod('qs_slider_margin_top', $colorScheme['settings']['qs_slider_margin_top']); ?>rem; 
            }
            .quicksand-slider-header-wrapper .flexslider .slides {
                max-height: <?php echo get_theme_mod('qs_slider_height', $colorScheme['settings']['qs_slider_height']); ?>rem; 
            }
            .quicksand-slider-header-wrapper .flexslider .slides h2 {
                <?php
                $rgb = quicksand_hex2rgb(get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]));
                $rgba = array($rgb['red'], $rgb['green'], $rgb['blue'], "0.5");
                ?>
                background: rgba(<?php echo esc_html(join(",", $rgba)) ?>); 
            }

            a.flex-active {
                background: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?> !important;
            }


            /*site-header*/
            .site-info-wrapper a,
            .site-info-wrapper .site-description {  
                color: #<?php echo preg_replace('/^#/', '', get_header_textcolor()); ?>; 
            }

            .site-info-wrapper.jumbotron  {
                background: <?php echo get_theme_mod('qs_header_background_color', $colorScheme['colors'][8]); ?>;
            }

            .site-info-wrapper h1, 
            .site-info-wrapper p { 
                background: <?php echo esc_html(get_theme_mod('qs_header_background_color', $colorScheme['colors'][8])) ?>; 
            }


            /*content*/
            .site-main-container { 
                background: <?php echo get_theme_mod('qs_content_background_color', $colorScheme['colors'][1]); ?>;
                color: <?php echo get_theme_mod('qs_content_text_color', $colorScheme['colors'][3]); ?>;
            }

            .site-main-container a { 
                color: <?php echo get_theme_mod('qs_content_link_color', $colorScheme['colors'][2]); ?>;
            }  

            /*content: postformats*/
            /*quote*/ 
            .site-main-container .post-quote  p { 
                color: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?>;
            } 




            /* === paginations === */  

            /*** list-view posts ****/
            .quicksand-post-pagination-list-view .page-numbers a,
            /*** paginated posts ****/
            /*none-active one*/ 
            .page-links a {  
                color: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?> !important;
                border-color: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?>;
            } 
            .page-links a:hover {  
                color: <?php echo get_theme_mod('qs_content_background_color', $colorScheme['colors'][1]); ?> !important;
                background: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?>; 
            } 



            /*2nd text color*/  
            .bypostauthor,
            .quicksand_search_title,
            .quicksand_archive_title,
            .site-content .card-header.entry-header h1,
            .site-content .card-header.entry-header h2,
            .site-content .card-header.entry-header h3,
            .site-content .card-header.entry-header h4,
            .site-content .card-header.entry-header h5,
            .site-content .card-header.entry-header h6,
            .site-content .card-header.entry-header h1>a,
            .site-content .card-header.entry-header h2>a,
            .site-content .card-header.entry-header h3>a,
            .site-content .card-header.entry-header h4>a,
            .site-content .card-header.entry-header h5>a,
            .site-content .card-header.entry-header h6>a { 
                color: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?>;
            }


            /*post*/
            .site-content-area .card {
                background: <?php echo get_theme_mod('qs_content_post_bg_color', $colorScheme['colors'][18]); ?>;
                border: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
            }
            .site-content-area .card .entry-summary {
                border-bottom: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
            } 

            .site-content-area .quicksand-meta-list-header,
            .site-content-area .card .entry-header {  
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>;
            }  
            .site-content-area .card .entry-footer,
            .site-content-area .card .author-bio {
                border-top: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>; 
            }  

            .comment-list ol {
                border-left: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
            }

            .card-header.comments-title,
            .comments-area ol .comment-body {
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>; 
            }


            /*sidebar*/ 
            #secondary .widget {
                border-color: <?php echo get_theme_mod('qs_sidebar_border_color', $colorScheme['colors'][15]); ?>;   
                <?php
                // outer-widget-border-width never more than 1 
                $widgetBorderWidth = get_theme_mod('qs_sidebar_border_width', $colorScheme['settings']['qs_sidebar_border_width']);
                $widgetBorderWidth = $widgetBorderWidth > 1 ? 1 : $widgetBorderWidth;
                ?>
                border-width: <?php echo esc_html($widgetBorderWidth); ?>px;
                border-style: solid;
            }

            #secondary .widget .card-header.widget-title {
                border-bottom: none;   
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>; 
                color: <?php echo get_theme_mod('qs_content_secondary_text_color', $colorScheme['colors'][4]); ?>;
            }


            #secondary .widget ul li,
            #secondary .widget ol li {
                color: <?php echo get_theme_mod('qs_sidebar_text_color', $colorScheme['colors'][13]); ?>; 
                background: <?php echo get_theme_mod('qs_sidebar_background_color', $colorScheme['colors'][12]); ?>;  
                border-color: <?php echo get_theme_mod('qs_sidebar_border_color', $colorScheme['colors'][15]); ?>;   
                border-width: <?php echo get_theme_mod('qs_sidebar_border_width', $colorScheme['settings']['qs_sidebar_border_width']); ?>px;
                border-style: solid;
            }

            #secondary .widget table a,
            #secondary .widget li a {
                color: <?php echo get_theme_mod('qs_sidebar_link_color', $colorScheme['colors'][14]); ?>;    
            }  


            /*footer*/ 
            .site-footer-widgetbar,
            .site-footer-widgetbar .widget li,
            .site-footer .row { 
                background: <?php echo get_theme_mod('qs_footer_background_color', $colorScheme['colors'][9]); ?>; 
                color: <?php echo get_theme_mod('qs_footer_text_color', $colorScheme['colors'][11]); ?>;
                border: none;
            }    

            .site-footer-widgetbar a,
            .site-footer .nav-wrapper a {  
                color: <?php echo get_theme_mod('qs_footer_link_color', $colorScheme['colors'][10]); ?>; 
            }   

            .site-footer .nav-wrapper a:hover {  
                color: <?php echo get_theme_mod('qs_footer_background_color', $colorScheme['colors'][9]); ?>;
                background: <?php echo get_theme_mod('qs_footer_link_hover_color', $colorScheme['colors'][17]); ?>;
            }  

            /*footer-social-menu*/
            .site-footer .site-social .fa-circle {
                color: <?php echo get_theme_mod('qs_footer_link_color', $colorScheme['colors'][10]); ?>; 
            }
            .site-footer .site-social .fa-stack:hover .fa-circle { 
                opacity:0.5;
            } 
        </style>
        <?php
    }

endif; //quicksand_customizer_css
add_action('wp_head', 'quicksand_customizer_css');
