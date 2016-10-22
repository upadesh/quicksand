<!--template: content-->
<!-- post --> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  

    <!-- post-title --> 
    <header class="entry-header card-block">
        
        <!--stick post-->
        <?php if (is_sticky() && is_home() && !is_paged()) : ?>
            <span class="sticky-post"><?php _e('Featured', 'quicksand'); ?></span>
        <?php endif; ?>

        <!-- post-title -->   
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

    <!--post-content--> 
    <?php quicksand_single_entry_content(); ?> 

    <!-- edit-link --> 
    <?php quicksand_entry_footer(); ?> 

</article><!-- .post-->  