<?php
/**
 * The template for the content bottom widget area 
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
if (!is_active_sidebar('sidebar-2')) {
    return;
}

// If we get this far, we have widgets. Let's do this.
?>

<!--  site-sidebar  --> 
<aside id="third" class="site-sidebar widget-area"> 
    <?php dynamic_sidebar('sidebar-2'); ?> 
</aside><!-- .site-sidebar .widget-area -->  