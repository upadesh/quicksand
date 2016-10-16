<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
get_header();
?> 
 
<!--template: 404-->
<div class="row">
    
    <!--  site-content-area -->    
    <main id="primary" class="site-content-area">  

        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title">
                    <?php _e('Oops! That page can&rsquo;t be found.', 'quicksand'); ?>
                </h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'quicksand'); ?></p>

                <?php get_search_form(); ?>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->

    </main><!-- .site-main --> 

    <?php get_sidebar(); ?> 

</div><!-- row--> 

<?php get_footer(); ?>