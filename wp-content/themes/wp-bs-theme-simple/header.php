<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge"> 
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
            <link rel="pingback" href="<?php esc_attr(bloginfo('pingback_url')); ?>">
        <?php endif; ?>
<!--<title>Bootstrap Wordpress theme</title>-->
        <!--[if IE]><link rel="shortcut icon" href="img/favicon.ico"><![endif]-->
        <!--<link rel="icon" href="img/favicon.ico">-->  
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>> 

        <!-- site-main-container --> 
        <div class="container site-main-container"> 

            <!-- site-header >-->
            <header class="site-header"> 

                <!-- site-navigation -->
                <?php get_template_part('template-parts/navigation', 'primary'); ?>  

                <!-- site-bloginfo -->
                <?php if (has_header_image()) { ?>
                    <div class="site-bloginfo">  
                        <a href=" <?php echo home_url(); ?>">
                            <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( esc_attr(get_bloginfo('title')) ); ?>" class="img-fluid" /> 
                        </a>
                    </div>

                <?php } else { ?> 
                    <div class="site-bloginfo">  
                        <div class="jumbotron">
                            <h1 class="display-3 blog-title"><?php bloginfo('name'); ?></h1>
                            <p class="lead blog-description"><?php bloginfo('description', 'display'); ?></p>
                            <hr class="m-y-2">
                        </div>  
                    </div>

                <?php } ?>
            </header><!-- .site-header --> 



            <!--  site-content --> 
            <div id="content" class="site-content">  
