//custom JS for initializing & more

jQuery(document).ready(function ($) {
    // Init fitVids
    fitvids('.video');

    // searchform in navbar
    // replace nav with searchform
    $('.nav-search').on('click', function () {

        var $navContent = $('.nav-content');
        var $searchForm = $('.nav-searchform');

        $navContent.fadeOut('fast', function () {
            $searchForm.removeClass('hidden-xs-up');
            $searchForm.hide().slideDown('fast');
        });

    });

    // searchform in navbar
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