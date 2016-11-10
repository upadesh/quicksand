/**
 * File customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    // if not in design-mode, don't go any further
    if (typeof wp.customize !== 'function') {
        return;
    }


    var hex2rgba_convert = function (hex, opacity) {
        hex = hex.replace('#', '');
        var r = parseInt(hex.substring(0, 2), 16);
        var g = parseInt(hex.substring(2, 4), 16);
        var b = parseInt(hex.substring(4, 6), 16);

        var result = 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
        return result;
    }


    /**
     * add style-tag to head for hover-effects
     * because the css()-function adds an inline style, it is not possible
     * to add a :hover function
     * Instead a whole style-tag is added or replaced
     * This style includes all hover-tags from quicksand_customizer_css in funtions-php
     *
     * @param {type} color
     * @param {type} value
     */
    var customizePseudoElements = function (colorName, colorValue) {

        var hoverDefaults = {
            qs_nav_link_color: wp.customize.value('qs_nav_link_color')(),
            qs_nav_link_hover_background_color: wp.customize.value('qs_nav_link_hover_background_color')(),
            qs_content_background_color: wp.customize.value('qs_content_background_color')(),
            qs_content_link_color: wp.customize.value('qs_content_link_color')(),
            qs_footer_background_color: wp.customize.value('qs_footer_background_color')(),
            qs_footer_link_hover_color: wp.customize.value('qs_footer_link_hover_color')()
        };

        hoverDefaults[colorName] = colorValue;


        var style = '<style class="hover-styles">'
                + '.navbar-light .navbar-nav .nav-link:hover,'
                + '.navbar-light .navbar-nav .nav-link:focus,'
                + '.navbar-light .navbar-nav .nav-link:active,  '
                + '.navbar-light .navbar-nav .nav-link:visited,  '
                + '.navbar-light .navbar-nav .open>.nav-link:hover,'
                + '.navbar-light .navbar-nav .open>.nav-link:visited,'
                + '.navbar-light .navbar-nav .open>.nav-link:focus,'
                + '.navbar-light .navbar-nav .open>.nav-link:active  {'
                + '     color:' + hoverDefaults.qs_nav_link_color + ';'
                + '}';


        style += '.site-nav-container .menu-item .dropdown-item:hover {'
                + '     background:' + hoverDefaults.qs_nav_link_hover_background_color + ';'
                + '}';



        style += '.quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:focus,'
                + '.quicksand-post-pagination-list-view .navigation.pagination .nav-links a:hover.page-numbers , '
                + '.quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:hover,'
                + '.quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers.current:hover {'
                + '    color: ' + hoverDefaults.qs_content_background_color + ';'
                + '    background: ' + hoverDefaults.qs_content_link_color + ';'
                + '    border-color: ' + hoverDefaults.qs_content_link_color + ';'
                + '}';


        style += '.site-footer .nav-wrapper a:hover {'
                + '     color:' + hoverDefaults.qs_footer_background_color + ';'
                + '     background:' + hoverDefaults.qs_footer_link_hover_color + ';'
                + '}';


        style += '.site-footer .site-social .fa-stack:hover .fa-circle {'
                + '     opacity: 0.5;'
                + '}'
                + '</style>';


        var el = $('.hover-styles-header');

        if (el.length) {
            el.replaceWith(style);
        } else {
            $('head').append(style);
        }
    }



    // navigation
    wp.customize('qs_nav_background_color', function (value) {
        value.bind(function (qs_nav_background_color) {
            var background;

            background = '.site-nav-container.container-fluid, \n\
            .site-navigation, \n\
            .site-nav-container nav.navbar, \n\
            .site-nav-container nav.navbar .navbar-toggler,\n\
            .site-nav-container .dropdown-menu';

            $(background).css('background', qs_nav_background_color);
            customizePseudoElements('qs_nav_background_color', qs_nav_background_color);
        });
    });
    wp.customize('qs_nav_link_color', function (value) {
        value.bind(function (qs_nav_link_color) {
            var color;

            color = '.nav-content .navbar-brand,\n\
            .nav-content .navbar-brand:hover,\n\
            .site-nav-container,\n\
            .site-nav-container .menu-item .nav-link , \n\
            .site-nav-container .menu-item .dropdown-item, \n\
            .site-nav-container nav.navbar .navbar-toggler, \n\
            .navbar-light .navbar-nav .nav-link, \n\
            .navbar-light .navbar-nav .active .nav-link:hover, \n\
            .navbar-light .navbar-nav .nav-link:hover, \n\
            .navbar-light .navbar-nav .nav-link:focus, \n\
            .navbar-light .navbar-nav .nav-link:active, \n\
            .navbar-light .navbar-nav .nav-link:visited, \n\
            .navbar-light .navbar-nav .open>.nav-link, \n\
            .navbar-light .navbar-nav .open>.nav-link:hover, \n\
            .navbar-light .navbar-nav .open>.nav-link:visited, \n\
            .navbar-light .navbar-nav .open>.nav-link:focus, \n\
            .navbar-light .navbar-nav .open>.nav-link:active';

            $(color).css('color', qs_nav_link_color);
            customizePseudoElements('qs_nav_link_color', qs_nav_link_color);
        });
    });
    wp.customize('qs_nav_link_hover_background_color', function (value) {
        value.bind(function (qs_nav_link_hover_background_color) {
            var background;

            background = '.site-nav-container .menu-item .dropdown-item.active,\n\
            .site-nav-container .menu-item .dropdown-item:hover ';

            $(background).css('background', qs_nav_link_hover_background_color);
            customizePseudoElements('qs_nav_link_hover_background_color', qs_nav_link_hover_background_color);
        });
    });


    // header
    wp.customize('qs_header_background_color', function (value) {
        value.bind(function (qs_header_background_color) {
            var backgroundJumbotron;
            var backgroundImageHeaderText;

            backgroundJumbotron = '.site-info-wrapper.jumbotron ';
            backgroundImageHeaderText = '.site-info-wrapper h1, \n\
            .site-info-wrapper p';

            $(backgroundJumbotron).css('background', qs_header_background_color);
            $(backgroundImageHeaderText).css('background', qs_header_background_color);

            customizePseudoElements('qs_header_background_color', qs_header_background_color);
        });
    });
    wp.customize('header_textcolor', function (value) {
        value.bind(function (header_textcolor) {
            var color;
            color = '.site-info-wrapper a, \n\
            .site-info-wrapper .site-description ';

            $(color).css('color', header_textcolor);
            customizePseudoElements('header_textcolor', header_textcolor);
        });
    });


    // content
    wp.customize('qs_content_background_color', function (value) {
        value.bind(function (qs_content_background_color) {
            var background;
            var color;

            background = '.site-main-container,\n\
            .site-main-container .navigation.pagination .nav-links .page-numbers ';

            color = '.quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:focus, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links a:hover.page-numbers , \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers.current, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:hover, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers.current:hover';

            $(background).css('background', qs_content_background_color);
            $(color).css('color', qs_content_background_color);
            customizePseudoElements('qs_content_background_color', qs_content_background_color);
        });
    });
    wp.customize('qs_content_text_color', function (value) {
        value.bind(function (qs_content_text_color) {
            var color;
            color = '.site-main-container ';

            $(color).css('color', qs_content_text_color);
            customizePseudoElements('qs_content_text_color', qs_content_text_color);
        });
    });
    wp.customize('qs_content_link_color', function (value) {
        value.bind(function (qs_content_link_color) {
            var color;
            var borderColor;

            color = '.site-main-container .navigation.pagination .nav-links .page-numbers, \n\
            .site-main-container a ';

            borderColor = '.site-main-container .navigation.pagination .nav-links .page-numbers , \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:focus, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links a:hover.page-numbers , \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers.current, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers:hover, \n\
            .quicksand-post-pagination-list-view .navigation.pagination .nav-links .page-numbers.current:hover ';

            $(color).css('color', qs_content_link_color);
            $(borderColor).css('border-color', qs_content_link_color);
            customizePseudoElements('qs_content_link_color', qs_content_link_color);
        });
    });
    wp.customize('qs_content_secondary_text_color', function (value) {
        value.bind(function (qs_content_secondary_text_color) {
            var color;
            var background;

            color = '.quicksand_search_title, \n\
            .quicksand_archive_title, \n\
            .site-content .card-header.entry-header h1, \n\
            .site-content .card-header.entry-header h2, \n\
            .site-content .card-header.entry-header h3, \n\
            .site-content .card-header.entry-header h4, \n\
            .site-content .card-header.entry-header h5, \n\
            .site-content .card-header.entry-header h6, \n\
            .site-content .card-header.entry-header h1>a, \n\
            .site-content .card-header.entry-header h2>a, \n\
            .site-content .card-header.entry-header h3>a, \n\
            .site-content .card-header.entry-header h4>a, \n\
            .site-content .card-header.entry-header h5>a, \n\
            .site-content .card-header.entry-header h6>a';

            background = '.quicksand-slider-header-wrapper .flexslider .slides h2,\n\
            a.flex-active';

            $(color).css('color', qs_content_secondary_text_color);
            $(background).css('background', hex2rgba_convert(qs_content_secondary_text_color, .5));

            customizePseudoElements('qs_content_secondary_text_color', qs_content_secondary_text_color);
        });
    });
    wp.customize('qs_content_post_bg_color', function (value) {
        value.bind(function (qs_content_post_bg_color) {
            var background;
            background = '.site-content-area .card';

            $(background).css('background', qs_content_post_bg_color);
            customizePseudoElements('qs_content_post_bg_color', qs_content_post_bg_color);
        });
    });
    wp.customize('qs_content_post_border_color', function (value) {
        value.bind(function (qs_content_post_border_color) {
            var border;
            var borderBottom;
            var borderTop;
            var borderLeft;

            border = '.site-content-area .card';
            borderBottom = '.site-content-area .card .entry-summary';
            borderTop = '.site-content-area .card .entry-footer, \n\
            .site-content-area .card .author-bio';
            borderLeft = ' .comment-list ol ';

            $(border).css('border', '1px solid ' + qs_content_post_border_color);
            $(borderBottom).css('border-bottom', '1px solid ' + qs_content_post_border_color);
            $(borderTop).css('border-top', '1px solid ' + qs_content_post_border_color);
            $(borderLeft).css('border-left', '1px solid ' + qs_content_post_border_color);
            customizePseudoElements('qs_content_post_border_color', qs_content_post_border_color);
        });
    });
    wp.customize('qs_content_title_bg_color', function (value) {
        value.bind(function (qs_content_title_bg_color) {
            var background;
            background = '.site-content-area .quicksand-meta-list-header,\n\
            .site-content-area .card .entry-header,\n\
            .site-content-area .card .entry-footer,\n\
            .site-content-area .card .author-bio,\n\
            .card-header.comments-title,\n\
            .comments-area ol .comment-body,\n\
            #secondary .widget .card-header.widget-title';

            $(background).css('background', qs_content_title_bg_color);
            customizePseudoElements('qs_content_title_bg_color', qs_content_title_bg_color);
        });
    });


    // sidebar
    wp.customize('qs_sidebar_border_color', function (value) {
        value.bind(function (qs_sidebar_border_color) {

            var borderColor;
            var borderStyle;

            borderColor = borderStyle = '#secondary .widget,\n\
            #secondary .widget ul li,\n\
            #secondary .widget ol li';

            $(borderColor).css('border-color', qs_sidebar_border_color);
            $(borderStyle).css('border-style', 'solid');
            customizePseudoElements('qs_sidebar_border_color', qs_sidebar_border_color);
        });
    });
    wp.customize('qs_sidebar_border_width', function (value) {
        value.bind(function (qs_sidebar_border_width) {

            // widget border-width can't be more than 1
            var borderWidthOuter = '#secondary .widget';
            var borderWidthInner;
            var borderBottom;

            borderWidthOuter = '#secondary .widget';
            borderWidthInner = '#secondary .widget ul li,\n\
            #secondary .widget ol li';
            // no border below the widget-title
            borderBottom = '#secondary .widget .card-header.widget-title';

            $(borderWidthOuter).css('border-width', qs_sidebar_border_width > 1 ? 1 : qs_sidebar_border_width);
            $(borderWidthInner).css('border-width', qs_sidebar_border_width);
            $(borderBottom).css('border-bottom', 'none');
            customizePseudoElements('qs_sidebar_border_width', qs_sidebar_border_width);
        });
    });
    wp.customize('qs_sidebar_text_color', function (value) {
        value.bind(function (qs_sidebar_text_color) {
            var color;
            color = '#secondary .widget ul li, \n\
            #secondary .widget ol li ';

            $(color).css('color', qs_sidebar_text_color);
            customizePseudoElements('qs_sidebar_text_color', qs_sidebar_text_color);
        });
    });
    wp.customize('qs_sidebar_background_color', function (value) {
        value.bind(function (qs_sidebar_background_color) {
            var background;
            background = '#secondary .widget ul li, \n\
            #secondary .widget ol li ';

            $(background).css('background', qs_sidebar_background_color);
            customizePseudoElements('qs_sidebar_background_color', qs_sidebar_background_color);
        });
    });
    wp.customize('qs_sidebar_link_color', function (value) {
        value.bind(function (qs_sidebar_link_color) {
            var color;
            color = '#secondary .widget li a, \n\
            #secondary .widget table a';

            $(color).css('color', qs_sidebar_link_color);
            customizePseudoElements('qs_sidebar_link_color', qs_sidebar_link_color);
        });
    });


    // footer
    wp.customize('qs_footer_background_color', function (value) {
        value.bind(function (qs_footer_background_color) {
            var background;
            var color;

            background = '.site-footer-widgetbar,\n\
            .site-footer-widgetbar .widget li,\n\
            .site-footer .row';

            color = '.site-footer .nav-wrapper a:hover';

            $(background).css('background', qs_footer_background_color);
            $(color).css('color', qs_footer_background_color);
            customizePseudoElements('qs_footer_background_color', qs_footer_background_color);
        });
    });
    wp.customize('qs_footer_text_color', function (value) {
        value.bind(function (qs_footer_text_color) {
            var color;

            color = '.site-footer-widgetbar,\n\
            .site-footer-widgetbar .widget li,\n\
            .site-footer .row';

            $(color).css('color', qs_footer_text_color);
            customizePseudoElements('qs_footer_text_color', qs_footer_text_color);
        });
    });
    wp.customize('qs_footer_link_color', function (value) {
        value.bind(function (qs_footer_link_color) {
            var color;

            color = '.site-footer-widgetbar a, \n\
            .site-footer .nav-wrapper a, \n\
            .site-footer .site-social .fa-circle ';

            $(color).css('color', qs_footer_link_color);
            customizePseudoElements('qs_footer_link_color', qs_footer_link_color);
        });
    });
    wp.customize('qs_footer_link_hover_color', function (value) {
        value.bind(function (qs_footer_link_hover_color) {
            var color;

            color = '.site-footer .nav-wrapper a:hover ';

            $(color).css('color', qs_footer_link_hover_color);
            customizePseudoElements('qs_footer_link_color', qs_footer_link_hover_color);
        });
    });
    wp.customize('qs_nav_logo_text', function (value) {
        value.bind(function (qs_nav_logo_text) {
            var text;

            text = '.nav-content .navbar-brand';

            $(text).text(qs_nav_logo_text);
            customizePseudoElements('qs_footer_link_color', qs_nav_logo_text);
        });
    });

    wp.customize('qs_slider_height', function (value) {
        value.bind(function (qs_slider_height) {

            var height;
            height = '.quicksand-slider-header-wrapper .flexslider .slides';

            $(height).css('max-height', qs_slider_height + 'rem');
            customizePseudoElements('qs_slider_height', qs_slider_height);
        });
    });

    wp.customize('qs_slider_margin_top', function (value) {
        value.bind(function (qs_slider_margin_top) {

            var marginTop;
            marginTop = '.quicksand-slider-header-wrapper';

            $(marginTop).css('margin-top', qs_slider_margin_top + 'rem');
            customizePseudoElements('qs_slider_margin_top', qs_slider_margin_top);
        });
    });

    wp.customize('qs_content_font_size', function (value) {
        value.bind(function (qs_content_font_size) {

            var fontSize = 'body,html';

            $(fontSize).css('font-size', qs_content_font_size + 'px');
            customizePseudoElements('qs_content_font_size', qs_content_font_size);
        });
    });

})(jQuery); 