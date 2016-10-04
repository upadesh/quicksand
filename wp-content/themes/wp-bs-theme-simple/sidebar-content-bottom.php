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
<!-- site-content-bottom-widgets --> 
<div class="row">
    <aside class="site-content-bottom-widgets"> 
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
    </aside><!-- .site-content-bottom-widgets --> 
</div>  