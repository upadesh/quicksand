<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>
<!--template: index-->
<div class="row">
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
        $a = get_post_format();
                get_template_part('template-parts/content', get_post_format());
                
            endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?> 

        <?php
        // navigation: post-list 
        the_posts_pagination(array(
            'prev_text' => __('Previous page', 'wp_bs_theme_simple'),
            'next_text' => __('Next page', 'wp_bs_theme_simple'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'wp_bs_theme_simple') . ' </span>',
        ));
        ?>

    </main><!-- .site-content-area  --> 


    <?php get_sidebar(); ?>


</div><!-- row-->



<?php get_footer(); ?>