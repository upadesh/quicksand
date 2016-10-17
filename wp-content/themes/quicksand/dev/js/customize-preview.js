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

    // content
    wp.customize('qs_content_background_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container .navigation.pagination .nav-links a:hover.page-numbers ,.site-main-container .navigation.pagination .nav-links .page-numbers.current').css('color', to);
            $('.site-main-container, .site-main-container .navigation.pagination .nav-links .page-numbers').css('background', to);
        });
    });

    wp.customize('qs_content_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('color', to);
        });
    });

    wp.customize('qs_content_secondary_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container .site-content h1, .site-main-container .site-content h2, .site-main-container .site-content h3, .site-main-container .site-content h4, .site-main-container .site-content h5, .site-main-container .site-content h6,         .site-main-container .site-content h1>a, .site-main-container .site-content h2>a, .site-main-container .site-content h3>a, .site-main-container .site-content h4>a, .site-main-container .site-content h5>a, .site-main-container .site-content h6>a').css('color', to);
        });
    });

    wp.customize('qs_content_link_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container a, .site-main-container .navigation.pagination .nav-links .page-numbers,.site-main-container .navigation.pagination .nav-links a:hover.page-numbers , .site-main-container .navigation.pagination .nav-links .page-numbers.current ').css('color', to);
            $('.site-main-container .navigation.pagination .nav-links .page-numbers, .site-main-container .navigation.pagination .nav-links a:hover.page-numbers , .site-main-container .navigation.pagination .nav-links .page-numbers.current').css('border-color', to);
        });
    });

    /**
     * add style-tag to head for hover-effect
     * because the css()-function adds an inline style, it is not possible
     * to add a :hover function
     * Instead a whole style-tag is added or replaced
     * 
     * @param {type} qs_nav_background_color
     * @param {type} qs_nav_link_color 
     */
    var customizeNavbarHover = function (qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_color) {
        var style, el;

        style = '<style class="hover-styles">'
                + '.site-nav-container, '
                + '.site-nav-container nav.navbar,'
                + '.site-nav-container .dropdown-menu { '
                + 'background: ' + qs_nav_background_color + ' !important;'
                + '}'
                + '.nav-wrapper .menu-item .nav-link,'
                + '.nav-wrapper .menu-item .dropdown-item { '
                + 'color: ' + qs_nav_link_color + ' !important;'
                + '}'
                + '.nav-wrapper .menu-item .dropdown-item:hover { '
                + 'background: ' + qs_nav_link_hover_color + ' !important;'
                + '}'
                + '</style>';

        el = $('.hover-styles-header');

        if (el.length) {
            el.replaceWith(style);
        } else {
            $('head').append(style);
        }
    }


    // navigation
    wp.customize('qs_nav_background_color', function (value) {
        value.bind(function (qs_nav_background_color) {
            var qs_nav_link_color = wp.customize.value('qs_nav_link_color')();   
            var qs_nav_link_hover_color = wp.customize.value('qs_nav_link_hover_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_color);
        });
    }); 
    wp.customize('qs_nav_link_color', function (value) {
        value.bind(function (qs_nav_link_color) {
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')(); 
            var qs_nav_link_hover_color = wp.customize.value('qs_nav_link_hover_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_color);

        });
    });
    wp.customize('qs_nav_link_hover_color', function (value) {
        value.bind(function (qs_nav_link_hover_color) {
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')(); 
            var qs_nav_link_color = wp.customize.value('qs_nav_link_color')();   
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_color);
        });
    });

    // header 
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });
    wp.customize('qs_header_background_color', function (value) {
        value.bind(function (qs_header_background_color) {
            $('.site-info-wrapper.jumbotron').css('background', qs_header_background_color);
            var qs_nav_link_color = wp.customize.value('qs_nav_link_color')();
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_header_background_color);
        });
    });
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            $('.site-info-wrapper .site-title a, .site-info-wrapper .site-description').css('color', to);
        });
    });


    // sidebar
    wp.customize('qs_sidebar_background_color', function (value) {
        value.bind(function (qs_sidebar_background_color) {
            $('#secondary .widget li').css('background', qs_sidebar_background_color);
            $('#secondary .widget table').css('background', qs_sidebar_background_color); 
        });
    });
    wp.customize('qs_sidebar_text_color', function (value) {
        value.bind(function (qs_sidebar_text_color) {
            $('#secondary .widget li ').css('color', qs_sidebar_text_color);
            $('#secondary .widget table ').css('color', qs_sidebar_text_color);
        });
    });
    wp.customize('qs_sidebar_link_color', function (value) {
        value.bind(function (qs_sidebar_link_color) {
            $('#secondary .widget li a').css('color', qs_sidebar_link_color);
            $('#secondary .widget table a').css('color', qs_sidebar_link_color);
        });
    });
    wp.customize('qs_sidebar_border_color', function (value) {
        value.bind(function (qs_sidebar_border_color) {
            $('#secondary .widget li').css('border', '1px solid ' + qs_sidebar_border_color);
            $('#secondary .widget table').css('border', '1px solid ' + qs_sidebar_border_color);
        });
    });



    var customizeFooterHover = function (qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color) {
        var style, el;
        var qs_content_background_color = wp.customize.value('qs_content_background_color')();

        style = '<style class="hover-styles">'
                + '.site-footer-widgetbar, .site-footer .row {'
                + 'background: ' + qs_footer_background_color + ';'
                + '}'
                + '.site-footer-widgetbar a, .site-footer .nav-wrapper a {'
                + 'color: ' + qs_footer_link_color + ';'
                + 'padding: 0 .6rem;'
                + '}'
                + '.site-footer .nav-wrapper a:hover { '
                + 'color: ' + qs_footer_background_color + ';'
                + 'background: ' + qs_footer_link_hover_color + ';'
                + '}'
                + '.site-footer .site-social .fa-circle { '
                + 'color: ' + qs_footer_link_color + ';'
                + '}'
                + '.site-footer .site-social .fa-stack:hover .fa-circle { '
                + 'color: ' + qs_content_background_color + ' !;'
                + '}'

                + '.site-footer-widgetbar .widget li {'
                + 'color: ' + qs_footer_link_color + ';'
                + 'background: ' + qs_footer_background_color + ';'
                + 'border: none;'
                + '}'

                + '</style>';

        el = $('.hover-styles-footer');

        if (el.length) {
            el.replaceWith(style);
        } else {
            $('head').append(style);
        }
    }

    wp.customize('qs_footer_background_color', function (value) {
        value.bind(function (qs_footer_background_color) {
            var qs_footer_link_color = wp.customize.value('qs_footer_link_color')();
            var qs_footer_link_hover_color = wp.customize.value('qs_footer_link_hover_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color);
        });
    });
    wp.customize('qs_footer_link_color', function (value) {
        value.bind(function (qs_footer_link_color) {
            var qs_footer_background_color = wp.customize.value('qs_footer_background_color')();
            var qs_footer_link_hover_color = wp.customize.value('qs_footer_link_hover_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color);
        });
    });
    wp.customize('qs_footer_link_hover_color', function (value) {
        value.bind(function (qs_footer_link_hover_color) {
            var qs_footer_link_color = wp.customize.value('qs_footer_link_color')();
            var qs_footer_background_color = wp.customize.value('qs_footer_background_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color);
        });
    }); 
    wp.customize('qs_footer_text_color', function (value) {
        value.bind(function (to) {
            $('.site-footer-widgetbar').css('color', to);
        });
    });

})(jQuery); 