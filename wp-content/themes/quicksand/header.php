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
        <div class="<?php echo esc_attr( get_theme_mod('qs_nav_fullwidth', 1) ? '' : 'container');  ?>  site-nav-container">
            <!-- site-navigation -->
            <?php get_template_part('template-parts/navigation', 'primary'); ?>  
        </div>

        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'quicksand'); ?></a>

        <!-- site-header >-->
        <header id="masthead" class="site-header <?php echo  esc_attr( get_theme_mod('qs_header_fullwidth', quicksand_get_color_scheme()['settings']['qs_header_fullwidth']) ? '' : 'container'); ?>"> 

            <!-- site-info -->
            <?php if (has_header_image()) { ?>
                <div class="site-info custom-header-image" style="background: url(<?php header_image(); ?>); background-repeat: no-repeat; background-size: cover; height:<?php echo esc_attr(get_custom_header()->height); ?>px;">  
                    <div  class="site-info-wrapper">
                
                        <h1 class="display-3 site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h1> 
                        <br>
                        <p class="lead site-description" ><?php esc_html( bloginfo('description', 'display') ); ?></p> 
                    </div>
                </div>

            <?php } else { ?> 
                <div class="site-info">  
                    <div  class="site-info-wrapper jumbotron"> 
                        <h1 class="display-3 site-title">
                           <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                        </h1> 
                        <hr class="m-y-2">
                        <p class="lead site-description"><?php esc_html( bloginfo('description', 'display') ); ?></p> 
                    </div>
                </div>

            <?php } ?><!--End header image check-->
        </header><!-- .site-header --> 



        <!-- site-main-container --> 
        <div class="container site-main-container"> 
            <!--  site-content --> 
            <div id="content" class="site-content">  
