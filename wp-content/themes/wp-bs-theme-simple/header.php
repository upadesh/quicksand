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
    <body <?php body_class(); ?> 

        <!-- site-main-container --> 
        <div class="container site-main-container"> 

            <!-- site-header >-->
            <header class="site-header">

                <!-- site-navigation -->
                <div class="site-navigation"> 
                    <nav class="navbar navbar-light bg-faded site-nav">
                        <button class="navbar-toggler hidden-lg-up pull-xs-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar" aria-controls="collapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            &#9776;
                        </button>

                        <div class="collapse navbar-toggleable-md" id="collapsingNavbar">
                            <!--<a class="navbar-brand" href="#">Navbar</a>-->
                            <div class="navbar-header">
                                <a class="navbar-brand" href="/">
                                    <img alt="Brand" src="img/deciduous_tree.png">
                                </a>
                            </div>
                            <ul class="site-nav-list nav navbar-nav  pull-xs-right">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                            </ul>
                        </div> 
                    </nav>
                </div><!-- .site-navigation -->  


                <!-- site-bloginfo -->
                <?php if (has_header_image()) { ?>
                    <div class="site-bloginfo">  
                        <a href=" <?php home_url(); ?>">
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
