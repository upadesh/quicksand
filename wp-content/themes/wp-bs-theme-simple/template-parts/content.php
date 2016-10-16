<!--template: content-->
<!-- post --> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 

    <!-- .entry-header --> 
    <header class="entry-header">
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <span class="sticky-post"><?php _e('Featured', 'wp-bs-theme-simple'); ?></span>
        <?php endif; ?>

        <!-- .entry-title -->   
        <?php
        the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>');
        ?> 
    </header><!-- .entry-header -->  

    <!--post-meta-->
    <?php wp_bs_theme_simple_entry_meta(); ?>

    <!--post excerpt-->
    <?php wp_bs_theme_simple_excerpt(); ?>

    <!--post thumbnail-->
    <?php wp_bs_theme_simple_post_thumbnail(); ?>

    <!-- .entry-content --> 
    <div class="entry-content">   
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title())
        );

        /* Displays page links for paginated posts (i.e. includes the <!–nextpage–>) */
        wp_link_pages(array(
            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'wp-bs-theme-simple') . '</span>',
            'after' => '</div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wp-bs-theme-simple') . ' </span>%',
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
                        __('Edit<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->

</article><!-- .post-->  