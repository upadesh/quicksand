<!--template: content-link--> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--post excerpt-->
    <?php quicksand_entry_excerpt(); ?> 

    <!--post title-->
    <?php
    if (!is_singular()) {
        quicksand_entry_title_postformat_gallery();
    } else {
        quicksand_entry_title();
    }
    ?>

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post-content--> 
    <?php quicksand_entry_content(); ?> 

    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  