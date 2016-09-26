<!--template: content-single-->
<!-- post --> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
        <!-- post-thumbnail --> 
        <div class="post-link">  
            <h1>
                <a href="<?php echo get_url_in_content(get_the_content()); ?>">LINK: <?php the_title(); ?></a> 
            </h1>
        </div><!-- .post-thumbnail -->
  
    <!--post-meta-->
    <?php get_template_part('template-parts/postmeta', get_post_format()); ?>


    <!-- .entry-content --> 
    <div class="entry-content">  
            <?php
            /* translators: %s: Name of current post */
//            the_content(
//                    sprintf(
//                            __('Continue reading %s', 'wp-bs-theme-simple'), the_title('<span class="screen-reader-text">', '</span>', false)
//                    )
//            );

            the_content();
            ?> 
    </div><!-- .entry-content -->   



    <!-- .entry-footer --> 
    <footer class="entry-footer">
    </footer><!-- .entry-footer -->
</article><!-- .post-->  

