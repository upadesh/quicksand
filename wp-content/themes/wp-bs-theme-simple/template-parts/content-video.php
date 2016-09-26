<!--template: content-->
<!-- post --> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    // Post thumbnail.
    // the_post_thumbnail();
    ?>

    <!-- .entry-header --> 
    <header class="entry-header">
        <!-- .entry-title -->   
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">VIDEO: ', '</h1>');
        else :
            the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">VIDEO: ', esc_url(get_permalink())), '</a></h2>');
        endif;
        ?> 
    </header><!-- .entry-header -->  

    <!--post-meta-->
    <?php get_template_part('template-parts/postmeta', get_post_format()); ?>


    <!-- .entry-content --> 
    <div class="entry-content">  


        <?php
        if (!is_single()) {
            $content = get_the_content();
            echo mb_strimwidth($content, 0, 400, '...');
            ?>
            <div> 
                <a href="<?php the_permalink(); ?>">Read more ...</a>
            </div>

        <?php
        } else {
            /* translators: %s: Name of current post */
            the_content(
                    sprintf(
                            __('Continue reading %s', 'wp-bs-theme-simple'), the_title('<span class="screen-reader-text">', '</span>', false)
                    )
            );
        }
            ?> 
    </div><!-- .entry-content -->   



    <!-- .entry-footer --> 
    <footer class="entry-footer">
    </footer><!-- .entry-footer -->

</article><!-- .post-->  