<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
get_header();
?>

<!--template: search-->
<div class="row"> 

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php if (have_posts()) : ?>
        
            <div class="card"> 
                <div class="card-block">
                    <h4 class="card-title"><?php _e('Search Results for:', 'quicksand'); ?></h4> 
                    <h6 class="card-subtitle text-muted"><?php printf(__('%s', 'quicksand'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h6>
                </div>
            </div> 

            <!--show posts in masonry-style-->
            <?php 
            if (get_theme_mod('qs_content_masonry', quicksand_get_color_scheme()['settings']['qs_content_masonry'])) {
                ?><div class="card-columns"> <?php
            }
            
            // Start the Loop.
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
//                get_template_part('template-parts/content', 'search');
                get_template_part('template-parts/content', get_post_format());

            // End the loop.
            endwhile; 
            
            // show posts in masonry-style
            if (get_theme_mod('qs_content_masonry', quicksand_get_color_scheme()['settings']['qs_content_masonry'])) {
                ?></div> <?php
            }

            // pagination
            quicksand_bs_style_paginator();
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?> 
    </main><!-- .site-main -->

    <?php get_sidebar(); ?>

</div> 

<?php get_footer(); ?>
