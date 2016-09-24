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

<div class="row">
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', 'single');


                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }


            endwhile;
        else :
            ?><p><?php _e('Sorry, no posts matched your criteria.', 'wp-bs-theme-simple'); ?></p><?php
        endif;
        ?> 



        <div class = "post-navigation">
            <?php
            the_post_navigation(array(
                'next_text' => '%title &raquo;',
                'prev_text' => '&laquo; %title',
                'screen_reader_text' => __('Continue Reading'),
            ));
            ?>
        </div>

    </main><!-- .site-content-area  --> 


    <?php get_sidebar(); ?>


</div><!-- row-->



<?php get_footer(); ?>