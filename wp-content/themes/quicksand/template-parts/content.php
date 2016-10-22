<!--template: content-->
<!-- post --> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  

    <!-- .entry-header --> 
    <header class="entry-header card-block">
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <span class="sticky-post"><?php _e('Featured', 'quicksand'); ?></span>
        <?php endif; ?>

        <!-- .entry-title -->   
        <?php
        the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>');
        ?> 
    </header><!-- .entry-header -->  

    <!--post-meta-->
    <?php quicksand_entry_meta(); ?>

    <!--post excerpt-->
    <?php quicksand_entry_excerpt(); ?>

    <!--post thumbnail-->
    <?php quicksand_entry_thumbnail(); ?> 

    <!-- .entry-content --> 
    <div class="entry-content">   
        <?php
        /* translators: %s: Name of current post */
        the_content(sprintf(
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title())
        );

        /* Displays page links for paginated posts (i.e. includes the <!–nextpage–>) */ 
        quicksand_paginated_posts_paginator();
        ?> 
    </div><!-- .entry-content -->   



    <!-- edit-link --> 
    <?php quicksand_entry_footer(); ?> 

</article><!-- .post-->  