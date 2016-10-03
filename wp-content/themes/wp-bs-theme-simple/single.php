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
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 1.0
 */
get_header();
?>

<!--template: single-->
<div class="row">
    
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'single');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

        endwhile;
        ?>  

        <div class = "post-navigation">
            <?php 
            // When is this needed???
            if (is_singular('attachment')) {
                // Parent post navigation.
                the_post_navigation(array(
                    'prev_text' => _x('<span class="meta-nav">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'wp-bs-theme-simple'),
                ));
            } elseif (is_singular('post')) {
                // Previous/next post navigation.
                the_post_navigation(array(
                    'prev_text' => '<i class="fa fa-backward" aria-hidden="true"></i> <span class="meta-nav" aria-hidden="true">%title</span> ' .
                    '<span class="screen-reader-text">' . __('Previous post:', 'wp-bs-theme-simple') . '</span> ' ,
                    'next_text' => '<span class="meta-nav" aria-hidden="true">%title</span> <i class="fa fa-forward" aria-hidden="true"></i>' .
                    '<span class="screen-reader-text">' . __('Next post:', 'wp-bs-theme-simple') . '</span> ' , 
                ));
            }
            ?>
        </div>

    </main><!-- .site-content-area  -->  

    <?php get_sidebar(); ?> 

</div><!-- row--> 

<?php get_footer(); ?>