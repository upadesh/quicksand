//custom JS for initializing & more

jQuery(document).ready(function ($) {
    
    console.info(settings); 
    // TODO: setup/init
    
    
    // Init fitVids
    fitvids('.video');
    
    // lightgallery
    // only trigger lightgallery when it is turned on
    if (parseInt(settings.qs_content_use_lightgallery)) { 
        $('.gallery').lightGallery({
            selector: '.gallery-item .lightgallery-item',
//            mode: 'lg-fade',
//            cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            animateThumb: true
        });
    }


    /*** searchform in navbar ***/
    // replace nav with searchform
    $('.nav-search').on('click', function () {

        var $navContent = $('.nav-content');
        var $searchForm = $('.nav-searchform');

        $navContent.fadeOut('fast', function () {
            $searchForm.removeClass('hidden-xs-up');
            $searchForm.hide().slideDown('fast');
        });

    });

    // replace searchform with nav 
    $('.nav-search-cancel').on('click', function () {

        var $navContent = $('.nav-content');
        var $searchForm = $('.nav-searchform');

        $searchForm.fadeOut('fast', function () {
            $navContent.hide().slideDown('fast');
        });
    });


    // show & hide searchform in mobile mode
    $('.nav-search-mobile').on('click', function () {
        var $searchFormMobile = $('.nav-searchform-mobile');
        $searchFormMobile.show("fold", {horizFirst: true}, 1000);
    });

    $('.nav-search-mobile-close').on('click', function () {
        var $searchFormMobile = $('.nav-searchform-mobile');
        $searchFormMobile.hide("fold", {horizFirst: true}, 1000);
    });

});