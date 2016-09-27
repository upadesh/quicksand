<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>

<!--template: content-page--> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header --> 

    <!--post thumbnail-->
    <?php wp_bs_theme_simple_post_thumbnail(); ?> 

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'wp-bs-theme-simple') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wp-bs-theme-simple') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
        ?>
    </div><!-- .entry-content -->

    <?php
    edit_post_link(
            sprintf(
                    /* translators: %s: Name of current post */
                    __('Edit<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title()
            ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->'
    );
    ?>

</article><!-- .post-->  