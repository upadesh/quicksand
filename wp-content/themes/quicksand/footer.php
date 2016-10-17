<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
?>


</div><!-- site-content--> 
</div><!-- .site-main-container -->


<!-- site-footer-widgetbar -->
<div class="container site-footer-widgetbar">  
    <!-- site-sidebar widget-area --> 
    <?php get_sidebar('content-bottom'); ?>   
</div><!-- .site-sidebar.widget-area -->


<?php 
$secondary_nav_options = array(
    'theme_location' => 'secondary',
    'depth' => 1,
    'container' => '',
    'container_class' => '',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'QuicksandNavwalker::fallback',
    'walker' => new QuicksandNavbarNavwalker()
);
?> 

<!-- site-info --> 
<?php if (!empty(quicksand_get_active_social_sites()) || has_nav_menu('secondary') ) : ?>
    <footer class="container-fluid site-footer">
        <div class="row">
            <div class="site-social">
                <div class="text-xs-center text-lg-right"> 
                    <?php quicksand_social_media_icons(); ?>
                </div>
            </div>
            <div class="nav-wrapper">
                <div class="text-xs-center text-lg-left">
                    <!--secondary navigation-->
                    <?php wp_nav_menu($secondary_nav_options); ?>
                </div>
            </div>
        </div>
    </footer><!-- site-info --> 

<?php endif; ?> 

<?php wp_footer(); ?>
</body>
</html>