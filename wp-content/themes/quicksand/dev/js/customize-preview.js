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
    

    // sidebar
    wp.customize('qs_sidebar_border_color', function (value) {
        value.bind(function (qs_sidebar_border_color) {
            
            var borderColor; 
            var borderStyle;  
            
            borderColor = borderStyle = '#secondary .widget,\n\
            #secondary .widget ul li,\n\
            #secondary .widget ol li';              

            $(borderColor).css('border-color', qs_sidebar_border_color);   
            
            $(borderStyle).css('border-style',  'solid'); 
        });
    });
    wp.customize('qs_sidebar_border_width', function (value) {
        value.bind(function (qs_sidebar_border_width) {
            
            // widget border-widthcan't be more than 1
            var borderWidthOuter = '#secondary .widget';   
            var borderWidthInner;  
            var borderBottom; 
            
            borderWidthOuter =  '#secondary .widget';
            borderWidthInner = '#secondary .widget ul li,\n\
            #secondary .widget ol li';   
            // no border below the widget-title
            borderBottom = '#secondary .widget .card-header.widget-title';  

            $(borderWidthOuter).css('border-width', qs_sidebar_border_width > 1 ? 1 : qs_sidebar_border_width);    
            $(borderWidthInner).css('border-width', qs_sidebar_border_width); 
            $(borderBottom).css('border-bottom',  'none' );     
        });
    }); 
    wp.customize('qs_sidebar_text_color', function (value) {
        value.bind(function (qs_sidebar_text_color) {
            var color;
            color = '#secondary .widget ul li, \n\
            #secondary .widget ol li ';

            $(color).css('color', qs_sidebar_text_color);
        });
    }); 
    wp.customize('qs_sidebar_background_color', function (value) {
        value.bind(function (qs_sidebar_background_color) {
            var background;
            background = '#secondary .widget ul li, \n\
            #secondary .widget ol li ';

            $(background).css('background', qs_sidebar_background_color); 
        });
    }); 
    wp.customize('qs_sidebar_link_color', function (value) {
        value.bind(function (qs_sidebar_link_color) {
            var color;
            color = '#secondary .widget li a, \n\
            #secondary .widget table a';

            $(color).css('color', qs_sidebar_link_color);
        });
    }); 



})(jQuery); 