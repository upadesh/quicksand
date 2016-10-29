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


    // navigation
    wp.customize('qs_nav_background_color', function (value) {
        value.bind(function (qs_nav_background_color) {
            var background;

            background = '.site-nav-container.container-fluid, \n\
            .site-nav-container nav.navbar, \n\
            .site-nav-container .dropdown-menu'; 
            
            $(background).css('background', qs_nav_background_color);
        });
    });
    wp.customize('qs_nav_link_color', function (value) {
        value.bind(function (qs_nav_link_color) {
            var color;

            color = '.site-nav-container,\n\
            .site-nav-container .menu-item .nav-link , \n\
            .site-nav-container .menu-item .dropdown-item, \n\
            .site-nav-container nav.navbar .navbar-toggler, \n\
            .navbar-light .navbar-nav .nav-link, \n\
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
        });
    });
    wp.customize('qs_nav_link_hover_background_color', function (value) {
        value.bind(function (qs_nav_link_hover_background_color) {
            var background;

            background = '.site-nav-container .menu-item .dropdown-item.active,\n\
            .site-nav-container .menu-item .dropdown-item:hover '; 
            
            $(background).css('background', qs_nav_link_hover_background_color);
        });
    });
    
    
    // header
    wp.customize('qs_header_background_color', function (value) {
        value.bind(function (qs_header_background_color) {
            var background;

            background = '.site-info-wrapper.jumbotron '; 
            
            $(background).css('background', qs_header_background_color);
        });
    });
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            var color;
            color = '.site-info-wrapper a, \n\
            .site-info-wrapper .site-description ';

            $(color).css('color', to);
        });
    });
    
    // content
    wp.customize('qs_content_background_color', function (value) {
        value.bind(function (qs_content_background_color) {
            var background;
            var color;

            background = '.site-main-container,\n\
            .site-main-container .navigation.pagination .nav-links .page-numbers '; 
            
            color = '.bs-pagination .navigation.pagination .nav-links .page-numbers:focus, \n\
            .bs-pagination .navigation.pagination .nav-links a:hover.page-numbers , \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current, \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers:hover, \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current:hover';
            
            $(background).css('background', qs_content_background_color); 
            $(color).css('color', qs_content_background_color);
        });
    });
    wp.customize('qs_content_text_color', function (value) {
        value.bind(function (qs_content_text_color) {
            var color;
            color = '.site-main-container ';

            $(color).css('color', qs_content_text_color);
        });
    }); 
    wp.customize('qs_content_link_color', function (value) {
        value.bind(function (qs_content_link_color) {
            var color;
            var borderColor; 
            
            color = '.site-main-container .navigation.pagination .nav-links .page-numbers, \n\
            .site-main-container a ';
            
            borderColor = '.site-main-container .navigation.pagination .nav-links .page-numbers , \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers:focus, \n\
            .bs-pagination .navigation.pagination .nav-links a:hover.page-numbers , \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current, \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers:hover, \n\
            .bs-pagination .navigation.pagination .nav-links .page-numbers.current:hover ';

            $(color).css('color', qs_content_link_color);
            $(borderColor).css('border-color', qs_content_link_color);
        });
    }); 
    wp.customize('qs_content_secondary_text_color', function (value) {
        value.bind(function (qs_content_secondary_text_color) {
            var color;
            color = '.bypostauthor, \n\
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
console.info(color);
            $(color).css('color', qs_content_secondary_text_color);
        });
    }); 
    wp.customize('qs_content_post_bg_color', function (value) {
        value.bind(function (qs_content_post_bg_color) {
            var background;
            background = '.site-content-area .card';

            $(background).css('background', qs_content_post_bg_color); 
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

            $(border).css('border',  '1px solid ' + qs_content_post_border_color); 
            $(borderBottom).css('border-bottom',  '1px solid ' + qs_content_post_border_color); 
            $(borderTop).css('border-top',  '1px solid ' + qs_content_post_border_color); 
            $(borderLeft).css('border-left',  '1px solid ' + qs_content_post_border_color); 
        });
    }); 
    wp.customize('qs_content_title_bg_color', function (value) {
        value.bind(function (qs_content_title_bg_color) {
            var background;
            background = '.site-content-area .card .entry-header,\n\
            .site-content-area .card .entry-footer,\n\
            .site-content-area .card .author-bio,\n\
            .card-header.comments-title,\n\
            .comments-area ol .comment-body,\n\
            #secondary .widget .card-header.widget-title';

            $(background).css('background', qs_content_title_bg_color); 
        });
    }); 
    




})(jQuery); 