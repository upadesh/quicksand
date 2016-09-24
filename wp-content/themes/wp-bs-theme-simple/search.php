<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
get_header();
?>

<section id="primary" class="content-area">

    <div class="row">

        <!--  site-content-area -->  
        <main id="primary" class="site-content-area">  

            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf(__('Search Results for: %s', 'wp-bs-theme-simple'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
                </header><!-- .page-header -->

                <?php
                // Start the Loop.
                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', 'search');

                // End the loop.
                endwhile;

                // Previous/next post navigation. 
                the_post_navigation(array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'wp-bs-theme-simple') . '</span> ' .
                    '<span class="screen-reader-text">' . __('Next post:', 'wp-bs-theme-simple') . '</span> ' .
                    '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'wp-bs-theme-simple') . '</span> ' .
                    '<span class="screen-reader-text">' . __('Previous post:', 'wp-bs-theme-simple') . '</span> ' .
                    '<span class="post-title">%title</span>',
                ));
            // If no content, include the "No posts found" template.
            else :
                get_template_part('template-parts/content', 'none');

            endif;
            ?>

        </main><!-- .site-main -->
    </div>
</section><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
