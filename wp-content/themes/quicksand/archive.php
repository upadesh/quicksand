<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
get_header();
?>

<!--template: archive-->
<div class="row">

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php if (have_posts()) : 
            echo the_archive_title('<div class="card"><div class="card-block"><h4 class="card-title">', '</h4></div>');
?>
            <!--show posts in masonry-style-->
            <?php 
            if (get_theme_mod('qs_content_masonry', quicksand_get_color_scheme()['settings']['qs_content_masonry'])) {
                ?><div class="card-columns"> <?php
            }
            
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content', get_post_format());

            // End the loop.
            endwhile; 
            
            // show posts in masonry-style
            if (get_theme_mod('qs_content_masonry', quicksand_get_color_scheme()['settings']['qs_content_masonry'])) {
                ?></div> <?php
            }

            
            // pagination
            quicksand_bs_style_paginator();
            
        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>

    </main><!--  .site-content-area --> 
    <?php get_sidebar(); ?>
</div> 

<?php get_footer(); ?>
