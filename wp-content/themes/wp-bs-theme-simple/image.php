<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
get_header();
?>

<!--template: image-->
<div class="row">

    <!--  site-content-area -->    
    <main id="primary" class="site-content-area">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <div class="entry-content">

                    <div class="entry-attachment">
                        <?php
                        /**
                         * Filter the default wp-bs-theme-simple image attachment size.
                         *
                         * @since WP-bs-theme-simple 0.0.1
                         *
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters('wp_bs_theme_simple_attachment_size', 'large');

                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>

                        <?php wp_bs_theme_simple_excerpt('entry-caption'); ?>

                    </div><!-- .entry-attachment -->

                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->

                <!-- image-navigation -->
                <nav id="image-navigation" class="navigation image-navigation">
                    <div class="nav-links"> 
                        <span class="nav-previous"><?php previous_image_link(false, __('Previous Image', 'wp-bs-theme-simple')); ?></span>
                        <span class="nav-next"><?php next_image_link(false, __('Next Image', 'wp-bs-theme-simple')); ?></span>  
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation --> 


                <footer class="entry-footer">
                    <?php wp_bs_theme_simple_entry_meta(); ?>
                    <?php
                    // Retrieve attachment metadata.
                    $metadata = wp_get_attachment_metadata();
                    if ($metadata) {
                        printf('<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', esc_html_x('Full size', 'Used before full size attachment link.', 'wp-bs-theme-simple'), esc_url(wp_get_attachment_url()), absint($metadata['width']), absint($metadata['height'])
                        );
                    }
                    ?>
                    <?php
                    edit_post_link(
                            sprintf(
                                    /* translators: %s: Name of current post */
                                    __('Edit<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title()
                            ), '<span class="edit-link">', '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

            // Parent post navigation
            the_post_navigation(array(
                'prev_text' => _x('<span class="meta-nav">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'wp-bs-theme-simple'),
            ));
        // End the loop.
        endwhile;
        ?>

    </main><!-- .content-area -->  

    <?php get_sidebar(); ?>

</div><!-- .row -->

<?php get_footer(); ?>
