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


            /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */

/*                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                background-color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> ;*/
                
                
            /* === btn-secondary === */
            .btn-secondary {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; 
            }
            .btn-secondary a {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?> !important;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border: none; 
            }
            .btn-secondary:hover {
                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>; 
            }
            .btn-secondary:hover a {
                text-decoration: none;
                border: none; 
                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?> !important;
                background-color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
            } 
            
            
            .btn-secondary:focus, .btn-secondary.focus {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-secondary:active, .btn-secondary.active,
            .open > .btn-secondary.dropdown-toggle {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                background-image: none; }
            .btn-secondary:active:hover, .btn-secondary:active:focus, .btn-secondary:active.focus, .btn-secondary.active:hover, .btn-secondary.active:focus, .btn-secondary.active.focus,
            .open > .btn-secondary.dropdown-toggle:hover,
            .open > .btn-secondary.dropdown-toggle:focus,
            .open > .btn-secondary.dropdown-toggle.focus {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-secondary.disabled:focus, .btn-secondary.disabled.focus, .btn-secondary:disabled:focus, .btn-secondary:disabled.focus {
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-secondary.disabled:hover, .btn-secondary:disabled:hover {
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }





            /* === btn-outline-secondary === */
            .btn-outline-secondary, .quicksand-post-pagination-list-view .nav-links a, .page-links a {
                color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                background-image: none;
                background-color: transparent;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-outline-secondary:hover, .quicksand-post-pagination-list-view .nav-links a:hover, .page-links a:hover {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-outline-secondary:focus, .quicksand-post-pagination-list-view .nav-links a:focus, .page-links a:focus, .btn-outline-secondary.focus, .quicksand-post-pagination-list-view .nav-links a.focus, .page-links a.focus {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-outline-secondary:active, .quicksand-post-pagination-list-view .nav-links a:active, .page-links a:active, .btn-outline-secondary.active, .quicksand-post-pagination-list-view .nav-links a.active, .page-links a.active,
            .open > .btn-outline-secondary.dropdown-toggle, .quicksand-post-pagination-list-view .nav-links
            .open > a.dropdown-toggle, .page-links
            .open > a.dropdown-toggle {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-outline-secondary:active:hover, .quicksand-post-pagination-list-view .nav-links a:active:hover, .page-links a:active:hover, .btn-outline-secondary:active:focus, .quicksand-post-pagination-list-view .nav-links a:active:focus, .page-links a:active:focus, .btn-outline-secondary:active.focus, .quicksand-post-pagination-list-view .nav-links a:active.focus, .page-links a:active.focus, .btn-outline-secondary.active:hover, .quicksand-post-pagination-list-view .nav-links a.active:hover, .page-links a.active:hover, .btn-outline-secondary.active:focus, .quicksand-post-pagination-list-view .nav-links a.active:focus, .page-links a.active:focus, .btn-outline-secondary.active.focus, .quicksand-post-pagination-list-view .nav-links a.active.focus, .page-links a.active.focus,
            .open > .btn-outline-secondary.dropdown-toggle:hover, .quicksand-post-pagination-list-view .nav-links
            .open > a.dropdown-toggle:hover, .page-links
            .open > a.dropdown-toggle:hover,
            .open > .btn-outline-secondary.dropdown-toggle:focus, .quicksand-post-pagination-list-view .nav-links
            .open > a.dropdown-toggle:focus, .page-links
            .open > a.dropdown-toggle:focus,
            .open > .btn-outline-secondary.dropdown-toggle.focus, .quicksand-post-pagination-list-view .nav-links
            .open > a.dropdown-toggle.focus, .page-links
            .open > a.dropdown-toggle.focus {
                color: <?php echo get_theme_mod('qs_button_color_primary', $colorScheme['colors'][21]); ?>;
                background-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>;
                border-color: <?php echo get_theme_mod('qs_button_color_secondary', $colorScheme['colors'][22]); ?>; }
            .btn-outline-secondary.disabled:focus, .quicksand-post-pagination-list-view .nav-links a.disabled:focus, .page-links a.disabled:focus, .btn-outline-secondary.disabled.focus, .quicksand-post-pagination-list-view .nav-links a.disabled.focus, .page-links a.disabled.focus, .btn-outline-secondary:disabled:focus, .quicksand-post-pagination-list-view .nav-links a:disabled:focus, .page-links a:disabled:focus, .btn-outline-secondary:disabled.focus, .quicksand-post-pagination-list-view .nav-links a:disabled.focus, .page-links a:disabled.focus {
                border-color: #d6e1dd; }
            .btn-outline-secondary.disabled:hover, .quicksand-post-pagination-list-view .nav-links a.disabled:hover, .page-links a.disabled:hover, .btn-outline-secondary:disabled:hover, .quicksand-post-pagination-list-view .nav-links a:disabled:hover, .page-links a:disabled:hover {
                border-color: #d6e1dd; }





            /* <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< */



            /* === navigation === */
            .site-navigation,
            .site-nav-container nav.navbar,
            .site-nav-container nav.navbar .navbar-toggler,
            .site-nav-container .dropdown-menu {
                background: <?php echo get_theme_mod('qs_nav_background_color', $colorScheme['colors'][6]); ?>;
            }

            .nav-search-mobile-wrapper .nav-search-mobile .fa,
            .nav-search-mobile-wrapper .nav-search-close-mobile .fa,
            .nav-search-wrapper .nav-search .fa,
            .nav-content .navbar-brand,
            .nav-content .navbar-brand:hover,
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

            /*search-bar*/ 
            .nav-search-mobile-wrapper .nav-search-mobile,
            .nav-search-mobile-wrapper .nav-search-close-mobile,
            .nav-search-wrapper .nav-search {
                background-color: <?php echo get_theme_mod('qs_nav_background_color', $colorScheme['colors'][6]); ?> !important;
                border: none !important;
            } 
            .nav-search-mobile-wrapper .nav-search-mobile:hover,
            .nav-search-mobile-wrapper .nav-search-close-mobile:hover,
            .nav-search-wrapper .nav-search:hover {
                color: <?php echo get_theme_mod('qs_nav_link_color', $colorScheme['colors'][7]); ?> !important;
                background: <?php echo get_theme_mod('qs_nav_background_color', $colorScheme['colors'][6]); ?> !important;
            }



            /* === slider === */
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


            /* === site-header === */
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


            /* === content === */
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

            /* === tags === */ 
            .entry-footer .tag-links .tag {  
                background: <?php echo get_theme_mod('qs_content_tag_background_color', $colorScheme['colors'][23]); ?>;
            }  
            .entry-footer .tag-links .tag a { 
                color: <?php echo get_theme_mod('qs_content_tag_font_color', $colorScheme['colors'][24]); ?>; 
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
            .site-content-area .card .entry-footer  {
                border-top: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>; 
            }  

            /*comment*/
            .comment-list ol {
                border-left: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
            }

            .card-header.comments-title,
            .comments-area ol .comment-body {
                background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>; 
            }


            /*biography*/ 
            .site-content-area .card .author-bio {
                border-top: 1px solid <?php echo get_theme_mod('qs_content_post_border_color', $colorScheme['colors'][19]); ?>; 
                background: <?php echo get_theme_mod('qs_biography_background_color', $colorScheme['colors'][25]); ?>; 
            }
            .site-content-area .card .author-link,
            .site-content-area .card .author-description {
                color: <?php echo get_theme_mod('qs_biography_font_color', $colorScheme['colors'][26]); ?>;
            }


            /* === sidebar === */ 
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

            /*<<<<<< TODO =========================================================*/
            /*workaround: input-group-form */
            /*            #secondary .widget>form{ 
                            background: <?php echo get_theme_mod('qs_content_title_bg_color', $colorScheme['colors'][20]); ?>;    
                        }
                         DAS MUSS EXPLIZIT in Venus JAZZZ
                        #secondary .widget>form .form-control { 
                            border: none;
                        } */
            /*<<<<<< TODO =========================================================*/


            /* === footer === */ 
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
