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
//            TODO: das nochmals gegenprüfen
            $('.menu-toggle:hover, .menu-toggle:focus, a, .main-navigation a:hover, .main-navigation a:focus, .dropdown-toggle:hover, .dropdown-toggle:focus, .social-navigation a:hover:before, .social-navigation a:focus:before, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .tagcloud a:hover, .tagcloud a:focus, .site-branding .site-title a:hover, .site-branding .site-title a:focus, .entry-title a:hover, .entry-title a:focus, .entry-footer a:hover, .entry-footer a:focus, .comment-metadata a:hover, .comment-metadata a:focus, .pingback .comment-edit-link:hover, .pingback .comment-edit-link:focus, .comment-reply-link, .comment-reply-link:hover, .comment-reply-link:focus, .required, .site-info a:hover, .site-info a:focus').css('color', to);
        });
    });

    wp.customize('wbts_link_color', function (value) {
        value.bind(function (to) {
            $('.site-main-container a').css('color', to);
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