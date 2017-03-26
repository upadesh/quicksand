<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 * 
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge"> 
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php esc_attr(bloginfo('pingback_url')); ?>">
        <?php endif; ?>  
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>
        <!-- site-main-container --> 
        <div class="<?php echo esc_attr(get_theme_mod('qs_nav_fullwidth', 1) ? '' : 'container'); ?>  site-nav-container">
            <!-- site-navigation -->
            <?php get_template_part('template-parts/navigation', 'primary'); ?>  
        </div>


        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'quicksand'); ?></a> 

        <!-- site-header >-->
        <header id="masthead" class="site-header <?php echo esc_attr(get_theme_mod('qs_header_fullwidth', quicksand_get_color_scheme()['settings']['qs_header_fullwidth']) ? '' : 'container'); ?>"> 

            <!-- header(-image)-->
            <?php
            // show header in general

            $isHeaderEnabled = get_theme_mod('qs_header_enabled', quicksand_get_color_scheme()['settings']['qs_header_enabled']);
            $isSliderEnabled = get_theme_mod('qs_slider_enabled', quicksand_get_color_scheme()['settings']['qs_slider_enabled']);

            if ($isHeaderEnabled):
                // hide header on frontpage when slider is enabled
                $hideWhenSliderIsEnabled = get_theme_mod('qs_header_hide_when_slider_enabled', quicksand_get_color_scheme()['settings']['qs_header_hide_when_slider_enabled']);
                $isFront = is_home() || is_front_page();

                // show header only on front-page
                $showOnlyOnFrontPage = get_theme_mod('qs_header_show_front', quicksand_get_color_scheme()['settings']['qs_header_show_front']);

                $showHeader = ($isFront && (!$isSliderEnabled)) ||
                        ($isFront && (!$hideWhenSliderIsEnabled && $isSliderEnabled)) ||
                        ($isFront && $showOnlyOnFrontPage && (!$hideWhenSliderIsEnabled)) ||
                        (!$isFront && !$showOnlyOnFrontPage);

//                echo "<p>x:". ($isFront && (!$isSliderEnabled)) ."</p>";
//                echo "<p>x:". ($isFront && (!$hideWhenSliderIsEnabled && $isSliderEnabled)) ."</p>";
//                echo "<p>x:". ($isFront && $showOnlyOnFrontPage && (!$hideWhenSliderIsEnabled)) ."</p>";  
//                echo "<p>x:". (!$isFront && !$showOnlyOnFrontPage ) ."</p>";  

                if ($showHeader) :
                    ?>

                    <!-- site-info -->
                    <?php if (has_header_image()) { ?>
                        <div class="site-info header-image">  
                            <img class="custom-header-image" src="<?php header_image(); ?>" alt="" />
                            <div  class="site-info-wrapper"> 
                                <div class="site-infos">
                                    <h1 class="display-3 site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                    </h1> 
                                    <br>
                                    <p class="lead site-description" ><?php esc_html(bloginfo('description', 'display')); ?></p> 
                                </div>

                            </div>
                        </div>  
                    <?php } else { ?> 
                        <div class="site-info">  
                            <div  class="site-info-wrapper jumbotron"> 
                                <h1 class="display-3 site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                                </h1>
                                <hr class="m-y-2">
                                <p class="lead site-description"><?php esc_html(bloginfo('description', 'display')); ?></p> 
                            </div>
                        </div>

                    <?php } ?><!--End header image check-->
                <?php endif;  //show header only on front-page ?> 
            <?php endif; //show header in general ?> 
        </header><!-- .site-header --> 


        <!-- slider-->
        <?php
        if ($isSliderEnabled && (is_home() || is_front_page() )) :
            ?> 
            <div class="<?php echo esc_attr(get_theme_mod('qs_slider_fullwidth', quicksand_get_color_scheme()['settings']['qs_slider_fullwidth']) ? '' : 'container'); ?> quicksand-slider-header-wrapper"> 
                <?php
                get_template_part('template-parts/slider');
                ?>
            </div> 
        <?php endif; ?>  



        <!-- site-main-container --> 
        <?php
        $isFullWidth = FALSE;
        $fullWidthTemplate = '';

        if (get_theme_mod('qs_content_fullwidth', quicksand_get_color_scheme()['settings']['qs_content_fullwidth'])) {
            $isFullWidth = TRUE;
        } elseif (is_page_template('template-fullwidth.php')) {
            $isFullWidth = TRUE;
            $fullWidthTemplate = ' qs-full-width-template';
        }

        $container = $isFullWidth ? 'container-fluid' : 'container';
        $container .= $fullWidthTemplate;
        ?>
        <div class="<?php echo esc_attr($container); ?> site-main-container"> 
            <!--  site-content --> 
            <div id="content" class="site-content"> 