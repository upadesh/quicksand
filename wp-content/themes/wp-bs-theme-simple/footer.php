<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>


</div><!-- site-content--> 


<!-- site-footer -->
<footer class="site-footer">  
    <!-- site-content-bottom-widgets --> 
    <?php get_sidebar('content-bottom'); ?>   
</footer><!-- .site-footer -->

</div><!-- .site-main-container -->


<!-- site-info -->
<div class="container-fluid">
    <div class="site-footer-info">
        <div class="row">
            <div class="site-social">
                <div class="text-xs-center text-lg-right"> 
                    <?php wp_bs_theme_simple_social_media_icons(); ?>
                </div>
            </div>
            <div class="site-copyright "> 
                <?php
                /**
                 * Fires before the wp-bs-theme-simple footer text for footer customization.
                 *
                 * @since WP-bs-theme-simple 0.0.1
                 */
                do_action('wp_bs_theme_simple_credits');
                ?> 
                <div class="text-xs-center text-lg-left">
                    <p class="text-muted lead">Copyright &copy;2016 
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- site-info -->
</div>
<?php wp_footer(); ?>
</body>
</html>