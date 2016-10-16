<!--template: content-link--> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

    <!-- .entry-header --> 
    <header class="entry-header">
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <span class="sticky-post"><?php _e('Featured', 'quicksand'); ?></span>
        <?php endif; ?>

        <!-- .entry-title -->  
        <!-- post-link --> 
        <div class="post-link">  
            <h1>
                <a href="<?php echo get_url_in_content(get_the_content()); ?>"><i class="fa fa-link" aria-hidden="true"></i> <?php the_title(); ?></a> 
            </h1>
        </div><!-- .post-link --> 
    </header><!-- .entry-header -->  

    <!--post-meta-->
    <?php quicksand_entry_meta(); ?>

    <!--post excerpt-->
    <?php quicksand_excerpt(); ?>

    <!--post thumbnail-->
    <?php quicksand_post_thumbnail(); ?>

    <!-- .entry-content --> 
    <div class="entry-content">   
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title()
                )
        );

        /* Displays page links for paginated posts (i.e. includes the <!–nextpage–>) */
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'quicksand') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'quicksand') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
        ?> 
    </div><!-- .entry-content -->   



    <!-- .entry-footer --> 
    <footer class="entry-footer">
        <?php
        edit_post_link(
                sprintf(
                        /* translators: %s: Name of current post */
                        __('Edit<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->

</article><!-- .post-->  