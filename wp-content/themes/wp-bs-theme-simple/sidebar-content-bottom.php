<?php
/**
 * The template for the content bottom widget areas on posts and pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
if (!is_active_sidebar('sidebar-2')) {
    return;
}

// If we get this far, we have widgets. Let's do this.
?>
<aside id="site-content-bottom-widgets" class="site-content-bottom-widgets" role="complementary">
    <?php if (is_active_sidebar('sidebar-2')) : ?>
        <div class="row">
            <div class="widget-area">
                <?php dynamic_sidebar('sidebar-2'); ?>
            </div><!-- .widget-area -->
        <?php endif; ?> 
    </div>
</aside><!-- .content-bottom-widgets --> 