<?php
/**
 * The template for the content bottom widget area 
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 1.0
 */
if (!is_active_sidebar('sidebar-2')) {
    return;
}

// If we get this far, we have widgets. Let's do this.
?>
<!-- .content-bottom-widgets --> 
<div class="row">
    <aside class="site-content-bottom-widgets">
        <?php dynamic_sidebar('sidebar-2'); ?>
    </aside><!-- .content-bottom-widgets --> 
</div>  