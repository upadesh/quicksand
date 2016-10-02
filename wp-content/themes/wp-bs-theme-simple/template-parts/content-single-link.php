<?php
/**
 * The template part for displaying single posts
 * 
 * Include here also custom templates for the various post-foramts, e.g.:
 *  content-single.-gallery.php
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>

<!--template: content-single-link--> 
<!--entry-content--> 
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

    if ('' !== get_the_author_meta('description')) {
        get_template_part('template-parts/biography');
    }
    ?> 
</div><!-- .entry-content -->  