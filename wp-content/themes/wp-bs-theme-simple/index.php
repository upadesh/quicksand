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
                get_template_part('template-parts/content', get_post_format());
            endwhile;
//            bootstrap_four_the_posts_pagination();
        else :
            ?><p><?php _e('Sorry, no posts matched your criteria.', 'wp-bs-theme-simple'); ?></p><?php
        endif;
        ?> 

        <?php
        // navigation: post-list 
        the_posts_pagination(array(
            'prev_text' => __('Previous page', 'twentysixteen'),
            'next_text' => __('Next page', 'twentysixteen'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'twentysixteen') . ' </span>',
        ));
        ?>

    </main><!-- .site-content-area  --> 


<?php get_sidebar(); ?>


</div><!-- row-->



<?php get_footer(); ?>