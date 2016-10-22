<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
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

            <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>

                <header class="card-block entry-header">
                    <?php the_title('<h1 class="card-title entry-title">', '</h1>'); ?>
                </header><!-- .entry-header -->

                <?php quicksand_entry_meta(); ?>

                <div class="card-block entry-content">

                    <div class="entry-attachment">
                        <?php
                        /**
                         * Filter the default quicksand image attachment size.
                         *
                         * @since Quicksand 0.2.1
                         *
                         * @param string $image_size Image size. Default 'large'.
                         */
                        $image_size = apply_filters('quicksand_attachment_size', 'large');

                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>

                        <?php quicksand_entry_excerpt('card-text entry-caption'); ?>

                    </div><!-- .entry-attachment -->


                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->


                <!--full-size image-link-->
                <div class="card-block entry-footer">
                    <?php
                    // Retrieve attachment metadata.
                    $metadata = wp_get_attachment_metadata();
                    if ($metadata) {
                        printf('<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>', esc_html_x('Full size', 'Used before full size attachment link.', 'quicksand'), esc_url(wp_get_attachment_url()), absint($metadata['width']), absint($metadata['height'])
                        );
                    }
                    ?> 
                </div> 
                
                
                
<!--                the_post_navigation(array(
                    'prev_text' => '<span class="meta-nav btn btn-outline-secondary" post-last-link aria-hidden="true"><i class="fa fa-long-arrow-left"></i>%title</span>' .
                    '<span class="screen-reader-text">' . __('Previous post:', 'quicksand') . '</span> ',
                    'next_text' => '<span class="meta-nav btn btn-outline-secondary post-next-link " aria-hidden="true">%title<i class="fa fa-long-arrow-right"></i></span>' .
                    '<span class="screen-reader-text">' . __('Next post:', 'quicksand') . '</span> ',
                ));-->


                <!-- image-navigation -->
                <nav id="image-navigation" class="card-block navigation image-navigation">
                    <div class="nav-links">  
                        <!--TODO; btns ausrichten & größe --> 
                        <span class="nav-previous btn btn-outline-secondary"><i class="fa fa-long-arrow-left"></i><?php previous_image_link(false, __('Previous Image', 'quicksand')); ?></span>
                        <span class="nav-next btn btn-outline-secondary"><?php next_image_link(false, __('Next Image', 'quicksand')); ?><i class="fa fa-long-arrow-right"></i></span> 
                    </div><!-- .nav-links -->
                </nav><!-- .image-navigation --> 

                <!--edit link-->
                <?php quicksand_edit_post(); ?> 
            </article><!-- #post-## -->

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) {
                comments_template();
            }

            // parent post link
            the_post_navigation(array(
                'prev_text' => _x('<span class="meta-nav">Published in </span><span class="post-title">%title</span>', 'Parent post link', 'quicksand'),
            ));
        // End the loop.
        endwhile;
        ?>

    </main><!-- .content-area -->  

    <?php get_sidebar(); ?>

</div><!-- .row -->

<?php get_footer(); ?>
