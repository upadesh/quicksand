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
        var color;
        var background;

        color = [
            '.site-main-container .navigation.pagination .nav-links a:hover.page-numbers',
            '.site-main-container .navigation.pagination .nav-links .page-numbers.current'
        ];
        background = [
            '.site-main-container',
            '.site-main-container .navigation.pagination .nav-links .page-numbers'
        ];

        value.bind(function (to) {
            $(color.join()).css('color', to);
            $(background.join()).css('background', to);
        });
    });

    wp.customize('qs_content_text_color', function (value) {
        var color;

        color = '.site-main-container';

        value.bind(function (to) {
            $(color).css('color', to);
        });
    });

    wp.customize('qs_content_secondary_text_color', function (value) {
        var color;

        color = '.site-main-container .site-content h1,\n\
            .site-main-container .site-content h2,\n\
            .site-main-container .site-content h3,\n\
            .site-main-container .site-content h4,\n\
            .site-main-container .site-content h5,\n\
            .site-main-container .site-content h6,\n\
            .site-main-container .site-content h1>a,\n\
            .site-main-container .site-content h2>a,\n\
            .site-main-container .site-content h3>a,\n\
            .site-main-container .site-content h4>a,\n\
            .site-main-container .site-content h5>a,\n\
            .site-main-container .site-content h6>a';
        value.bind(function (to) {
            $(color).css('color', to);
        });
    });

    wp.customize('qs_content_link_color', function (value) {
        var color;
        var borderColor;
        color = '.site-main-container a,\n\
            .site-main-container .navigation.pagination .nav-links .page-numbers,\n\
            .site-main-container .navigation.pagination .nav-links a:hover.page-numbers ,\n\
            .site-main-container .navigation.pagination .nav-links .page-numbers.current';
        borderColor = '.site-main-container .navigation.pagination .nav-links .page-numbers,\n\
            .site-main-container .navigation.pagination .nav-links a:hover.page-numbers ,\n\
            .site-main-container .navigation.pagination .nav-links .page-numbers.current';

        value.bind(function (to) {
            $(color).css('color', to);
            $(borderColor).css('border-color', to);
        });
    });

    wp.customize('qs_content_post_bg_color', function (value) {
        var background;

        background = '.site-content-area article';
        value.bind(function (qs_content_post_bg_color) {
            $(background).css('background', qs_content_post_bg_color);
        });
    });

    wp.customize('qs_content_post_border_color', function (value) {
        var border;

        border = '.site-content-area article';
        value.bind(function (qs_content_post_border_color) {
            $(border).css('border', '1px solid ' + qs_content_post_border_color);
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
    var customizeNavbarHover = function (qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_background_color) {
        var style, el;

        // TODO: hier nur hover???? 
        style = '<style class="hover-styles">'
                + '.site-nav-container, '
                + '.site-nav-container nav.navbar,'
                + '.site-nav-container .dropdown-menu { '
                + 'background: ' + qs_nav_background_color + ' !important;'
                + '}'
                + '.site-nav-container,'
                + '.navbar-light .navbar-nav .nav-link,'
                + '.navbar-light .navbar-nav .open>.nav-link,'
                + '.site-nav-container .menu-item .nav-link,'
                + '.site-nav-container .menu-item .dropdown-item { '
                + 'color: ' + qs_nav_link_color + ' !important;'
                + '}'
                + '.site-nav-container .menu-item .dropdown-item.active { '
                + 'background: ' + qs_nav_link_hover_background_color + ' !important;'
                + '}'
                + '.site-nav-container .menu-item .dropdown-item:hover { '
                + 'background: ' + qs_nav_link_hover_background_color + ' !important;'
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
            var qs_nav_link_hover_background_color = wp.customize.value('qs_nav_link_hover_background_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_background_color);
        });
    });
    wp.customize('qs_nav_link_color', function (value) {
        value.bind(function (qs_nav_link_color) {
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')();
            var qs_nav_link_hover_background_color = wp.customize.value('qs_nav_link_hover_background_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_background_color);

        });
    });
    wp.customize('qs_nav_link_hover_background_color', function (value) {
        value.bind(function (qs_nav_link_hover_background_color) {
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')();
            var qs_nav_link_color = wp.customize.value('qs_nav_link_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_nav_link_hover_background_color);
        });
    });

    // header 
    wp.customize('blogname', function (value) {
        var text;

        text = '.site-title';
        value.bind(function (to) {
            $(text).text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        var text;

        text = '.site-description';
        value.bind(function (to) {
            $(text).text(to);
        });
    });
    wp.customize('qs_header_background_color', function (value) {
        value.bind(function (qs_header_background_color) {
            var background;

            background = '.site-info-wrapper.jumbotron';
            $(background).css('background', qs_header_background_color);

            var qs_nav_link_color = wp.customize.value('qs_nav_link_color')();
            var qs_nav_background_color = wp.customize.value('qs_nav_background_color')();
            customizeNavbarHover(qs_nav_background_color, qs_nav_link_color, qs_header_background_color);
        });
    });
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            var color;
            color = '.site-info-wrapper .site-title a,\n\
                 .site-info-wrapper .site-description';

            $(color).css('color', to);
        });
    });


    // sidebar 
    wp.customize('qs_sidebar_border_width', function (value) {
        var borderWidth;

        borderWidth = '#secondary .widget table, #secondary .widget ul li, #secondary .widget ol li';
        value.bind(function (qs_content_post_border_width) { 
            $(borderWidth).css('border-width', qs_content_post_border_width + 'px');
        });
    });
    
    wp.customize('qs_sidebar_background_color', function (value) {
        value.bind(function (qs_sidebar_background_color) {
            var background;

            background =
                    '#secondary .widget li,\n\
                #secondary .widget table';
            //TODO: geht das??? TEST!!!
            $(background).css('background', qs_sidebar_background_color);
        });
    });
    wp.customize('qs_sidebar_text_color', function (value) {
        var color;
        color = '#secondary .widget li, \n\
                  #secondary .widget table';

        value.bind(function (qs_sidebar_text_color) {
            $(color).css('color', qs_sidebar_text_color);
        });
    });
    wp.customize('qs_sidebar_link_color', function (value) {
        var color;

        color = '#secondary .widget li a,\n\
                  #secondary .widget table a';
        value.bind(function (qs_sidebar_link_color) {
            $(color).css('color', qs_sidebar_link_color);
        });
    });
    wp.customize('qs_sidebar_border_color', function (value) {
        var border;
        var borderTop;
        var borderBottom;
        var borderLeft;
        var borderRight;

        border = '#secondary .widget li';

        borderTop = '#secondary .widget li  li, \n\
             #secondary .widget table';
        borderBottom = '#secondary .widget li  li';
        borderLeft = '#secondary .widget li  li';
        borderRight = '#secondary .widget li  li';

        value.bind(function (qs_sidebar_border_color) {
            $(border).css('border', '1px solid ' + qs_sidebar_border_color);
            $(borderTop).css('border-top', '1px solid ' + qs_sidebar_border_color);
            $(borderBottom).css('border-bottom', 'none');
            $(borderLeft).css('border-left', 'none');
            $(borderRight).css('border-right', 'none');
        });
    });


    // footer
    var customizeFooterHover = function (qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color, qs_footer_text_color) {
        var style, el;
        var qs_content_background_color = wp.customize.value('qs_content_background_color')();

        style = '<style class="hover-styles">'
                + '.site-footer-widgetbar, .site-footer-widgetbar .widget li, .site-footer .row {'
                + 'background: ' + qs_footer_background_color + ';'
                + 'color: ' + qs_footer_text_color + ';'
                + 'border: none;'
                + '}'

                + '.site-footer-widgetbar a, .site-footer .nav-wrapper a {'
                + 'color: ' + qs_footer_link_color + ';'
                + 'padding: 0 .6rem;'
                + '}'

                + '.site-footer .nav-wrapper a:hover { '
//                + 'color: ' + qs_footer_background_color + ';'
                + 'background: ' + qs_footer_link_hover_color + ';'
                + '}'

                + '.site-footer .site-social .fa-circle { '
                + 'color: ' + qs_footer_link_color + ';'
                + '}'

                + '.site-footer .site-social .fa-stack:hover .fa-circle { '
                + 'color: ' + qs_content_background_color + ' !;'
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
            var qs_footer_text_color = wp.customize.value('qs_footer_text_color')();
            var qs_footer_link_color = wp.customize.value('qs_footer_link_color')();
            var qs_footer_link_hover_color = wp.customize.value('qs_footer_link_hover_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color, qs_footer_text_color);
        });
    });
    wp.customize('qs_footer_link_color', function (value) {
        value.bind(function (qs_footer_link_color) {
            var qs_footer_text_color = wp.customize.value('qs_footer_text_color')();
            var qs_footer_background_color = wp.customize.value('qs_footer_background_color')();
            var qs_footer_link_hover_color = wp.customize.value('qs_footer_link_hover_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color, qs_footer_text_color);
        });
    });
    wp.customize('qs_footer_link_hover_color', function (value) {
        value.bind(function (qs_footer_link_hover_color) {
            var qs_footer_text_color = wp.customize.value('qs_footer_text_color')();
            var qs_footer_link_color = wp.customize.value('qs_footer_link_color')();
            var qs_footer_background_color = wp.customize.value('qs_footer_background_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color, qs_footer_text_color);
        });
    });
    wp.customize('qs_footer_text_color', function (value) {
        value.bind(function (qs_footer_text_color) {
            var qs_footer_link_hover_color = wp.customize.value('qs_footer_link_hover_color')();
            var qs_footer_link_color = wp.customize.value('qs_footer_link_color')();
            var qs_footer_background_color = wp.customize.value('qs_footer_background_color')();
            customizeFooterHover(qs_footer_background_color, qs_footer_link_color, qs_footer_link_hover_color, qs_footer_text_color);
        });
    });

})(jQuery); 