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
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
get_header();
?>

<!--template: archive-->
<div class="row">

    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <?php if (have_posts()) : ?>

            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </header><!-- .page-header -->

            <?php
            // Start the Loop.
            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part('template-parts/content', get_post_format());

            // End the loop.
            endwhile;
            ?> 

            <div class="bs-pagination">
                <?php
                // navigation: post-list 
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fa fa-backward" aria-hidden="true"></i>',
                    'next_text' => '<i class="fa fa-forward" aria-hidden="true"></i>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'wp-bs-theme-simple') . ' </span>',
                ));
                ?>
            </div>
            <?php
        // If no content, include the "No posts found" template.
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>

    </main><!--  .site-content-area --> 
    <?php get_sidebar(); ?>
</div> 

<?php get_footer(); ?>
