/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) { 
    // if not in design-mode, don't go any further
    if (typeof wp.customize !== 'function')  {
        return;
    } 
    
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

    wp.customize('wbts_background_content_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('background', to);
        });
    });

    wp.customize('wbts_main_text_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container').css('color', to);
        });
    });

    wp.customize('wbts_secondary_text_color', function (value) {
        value.bind(function (to) { 
            $('.site-main-container .site-content h1, .site-main-container .site-content h2, .site-main-container .site-content h3, .site-main-container .site-content h4, .site-main-container .site-content h5, .site-main-container .site-content h6,         .site-main-container .site-content h1>a, .site-main-container .site-content h2>a, .site-main-container .site-content h3>a, .site-main-container .site-content h4>a, .site-main-container .site-content h5>a, .site-main-container .site-content h6>a').css('color', to);
        });
    });

    wp.customize('wbts_link_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container a, .site-footer-info a').css('color', to);
        });
    });

    wp.customize('wbts_nav_link_color', function (value) {
        value.bind(function (to) {
            $('#menu-primary .nav-item .nav-link, #menu-primary .nav-item .dropdown-item').css('color', to);
        });
    });
    wp.customize('wbts_nav_background_color', function (value) {
        value.bind(function (to) {
            $('.site-nav-container, .site-nav-container nav.navbar, .site-nav-container .dropdown-menu').css('background-color', to); 
        });
    });
    wp.customize('wbts_header_background_color', function (value) {
        value.bind(function (to) {
            $('.site-info-wrapper.jumbotron').css('background-color', to);
        });
    });
})(jQuery); 