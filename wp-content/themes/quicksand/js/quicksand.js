//custom JS for initializing & more

jQuery(document).ready(function ($) {

//    console.info(settings); 
    // TODO: oo


    // lightgallery
    var initLightgallery = function () {
        // only trigger lightgallery when it is turned on
        if (parseInt(settings.qs_content_use_lightgallery)) {
            $('.gallery').lightGallery({
                selector: '.gallery-item .lightgallery-item',
//            mode: 'lg-fade',
//            cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
                animateThumb: true
            });
        }
    }





    // flexslider header
    var initFlexsliderHeader = function () {
        $('.quicksand-slider-header-wrapper .flexslider').flexslider({
            animation: "fade",
            direction: "horizontal",
            slideshowSpeed: 7000,
            animationSpeed: 600,
            prevText: "", //String: Set the text for the "previous" directionNav item
            nextText: "", //String: Set the text for the "next" directionNav item 

            easing: "swing", //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported! 
            reverse: false, //{NEW} Boolean: Reverse the animation direction
            animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            smoothHeight: false, //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
            startAt: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
            slideshow: true, //Boolean: Animate slider automatically 
            initDelay: 0, //{NEW} Integer: Set an initialization delay, in milliseconds
            randomize: false, //Boolean: Randomize slide order
            fadeFirstSlide: true, //Boolean: Fade in the first slide when animation type is "fade"

            // Usability features
            pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: false, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            pauseInvisible: true, //{NEW} Boolean: Pause the slideshow when tab is invisible, resume when visible. Provides better UX, lower CPU usage.
            useCSS: true, //{NEW} Boolean: Slider will use CSS3 transitions if available
            touch: true                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
        });
    }
    
    // flexslider header
    var initFlexsliderPost = function () {
        $('.quicksand-post-gallery .flexslider').flexslider({
            controlNav: false, 
            
            
            animation: "fade",
            direction: "horizontal",
            slideshowSpeed: 7000,
            animationSpeed: 600,
            prevText: "", //String: Set the text for the "previous" directionNav item
            nextText: "", //String: Set the text for the "next" directionNav item 

            easing: "swing", //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported! 
            reverse: false, //{NEW} Boolean: Reverse the animation direction
            animationLoop: true, //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
            smoothHeight: false, //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
            startAt: 0, //Integer: The slide that the slider should start on. Array notation (0 = first slide)
            slideshow: true, //Boolean: Animate slider automatically 
            initDelay: 0, //{NEW} Integer: Set an initialization delay, in milliseconds
            randomize: false, //Boolean: Randomize slide order
            fadeFirstSlide: true, //Boolean: Fade in the first slide when animation type is "fade"

            // Usability features
            pauseOnAction: true, //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
            pauseOnHover: false, //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
            pauseInvisible: true, //{NEW} Boolean: Pause the slideshow when tab is invisible, resume when visible. Provides better UX, lower CPU usage.
            useCSS: true, //{NEW} Boolean: Slider will use CSS3 transitions if available
            touch: true                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
        });
    }


    // searchform in navbar
    var initSearchBar = function () {
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
    }

    // iniitaliase scripts  
    // searchbar
    initSearchBar();

    // Init fitVids
    fitvids('.video');

    // slider in header
    initFlexsliderHeader();
    
    // slider in post-head-overview
    initFlexsliderPost();

    // lightgallery
    initLightgallery();


});