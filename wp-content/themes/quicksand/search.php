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

            <header class="page-header">
                <h1 class="page-title"><?php printf(__('Search Results for: %s', 'quicksand'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
            </header><!-- .page-header -->

            <?php
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
            ?> 

            <div class="bs-pagination">
                <?php
                // navigation: post-list 
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fa fa-backward" aria-hidden="true"></i>',
                    'next_text' => '<i class="fa fa-forward" aria-hidden="true"></i>',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'quicksand') . ' </span>',
                ));
                ?>
            </div>
            <?php
        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?> 
    </main><!-- .site-main -->

    <?php get_sidebar(); ?>

</div> 

<?php get_footer(); ?>