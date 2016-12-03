<!--template: content-link--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>

    <!--post gallery as a slider-->
    <?php
    if (!is_singular()) {
        quicksand_entry_header_postformat_gallery();
    }
    ?>  

    <!--post excerpt-->
    <?php quicksand_entry_excerpt(); ?> 

    <!--post title-->
    <?php quicksand_entry_title(); ?>

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post-content--> 
    <?php
    if (!is_singular()) {
        quicksand_the_entry_content_gallery();
    } else {
        quicksand_the_entry_content();
    }
    ?> 

    <!--post-tags-->
    <?php quicksand_entry_tags(); ?>  
    
    <!--author-bio-->
    <?php quicksand_author_biography(); ?> 

    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  