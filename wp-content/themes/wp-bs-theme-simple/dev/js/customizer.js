/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {

    // Site title and description.
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

    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            $('.site-title').css('color', to);
            $('.site-description').css('color', to);
        });
    }); 

    wp.customize('wbts_background_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('background', to);
        });
    });

    wp.customize('wbts_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('color', to);
        });
    });

    wp.customize('wbts_link_color', function (value) {
        value.bind(function (to) {
            $('a').css('color', to);
        });
    });

    wp.customize('wbts_nav_link_color', function (value) {
        value.bind(function (to) {
            $('nav.navbar #menu-primary .nav-item .nav-link').css('color', to);
        });
    });
    wp.customize('wbts_nav_background_color', function (value) {
        value.bind(function (to) {
            $('nav.navbar').css('background-color', to);
        });
    });
})(jQuery);
