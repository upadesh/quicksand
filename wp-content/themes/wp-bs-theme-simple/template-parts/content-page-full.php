
<!-- post --> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="site-full-width">
    <?php
    // -- post thumbnail --
    wp_bs_theme_simple_post_thumbnail();
    ?>

    <!-- .entry-header --> 
    <header class="entry-header">
        <!-- .entry-title -->   
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        endif;
        ?> 
    </header><!-- .entry-header -->   


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

