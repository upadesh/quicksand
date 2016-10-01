<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since WP-bs-theme-simple 1.0
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
        <!--[if IE]><link rel="shortcut icon" href="img/favicon.ico"><![endif]-->
        <!--<link rel="icon" href="img/favicon.ico">-->  
        <?php wp_head(); ?> 
    </head>
    <body <?php body_class(); ?>>  

        <!-- site-main-container --> 
        <div class="container site-main-container"> 

            <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'wp_bs_theme_simple'); ?></a>

            <!-- site-header >-->
            <header class="site-header"> 

                <!-- site-navigation -->
                <?php get_template_part('template-parts/navigation', 'primary'); ?>  

                <!-- site-info -->
                <?php if (has_header_image()) { ?>
                    <?php
                    /**
                     * Filter the default wp_bs_theme_simple custom header sizes attribute.
                     *
                     * @since WP-bs-theme-simple 0.0.1
                     *
                     * @param string $custom_header_sizes sizes attribute
                     * for Custom Header. Default '(max-width: 709px) 85vw,
                     * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                     */
                    $custom_header_sizes = apply_filters('wp_bs_theme_simple_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px');
                    ?>
                    <div class="site-info custom-header-image" style="background: url(<?php header_image(); ?>); height:<?php echo esc_attr(get_custom_header()->height); ?>px;">  
                        <div  class="site-info-wrapper">
                            <h1 class="display-3 site-title"><?php bloginfo('name'); ?></h1> 
                            <br>
                            <p class="lead site-description" ><?php bloginfo('description', 'display'); ?></p> 
                        </div>
                    </div>

                <?php } else { ?> 
                    <div class="site-info">  
                        <div class="jumbotron">
                            <h1 class="display-3 site-title"><?php bloginfo('name'); ?></h1>
                            <hr class="m-y-2">
                            <p class="lead site-description"><?php bloginfo('description', 'display'); ?></p>
                        </div>  
                    </div>

                <?php } ?><!--End header image check-->
            </header><!-- .site-header --> 



            <!--  site-content --> 
            <div id="content" class="site-content">  
