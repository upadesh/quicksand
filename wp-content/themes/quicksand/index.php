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
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
//phpinfo();
get_header();
?>
<!--template: index-->
<div class="row">
    <!--  site-content-area -->  
    <main id="primary" class="site-content-area">  

        <!-- post-list -->
        <?php
        if (have_posts()) :
            if (is_home() && !is_front_page()) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header> 
                <?php
            endif;

            while (have_posts()) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 * 
                 * This is only for the listing part.
                 * For single presention have a look inside ... single.php
                 */
                get_template_part('template-parts/content', get_post_format());

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
    </main><!-- .site-content-area  -->  

<?php get_sidebar(); ?>

</div><!-- row--> 

<?php get_footer(); ?>