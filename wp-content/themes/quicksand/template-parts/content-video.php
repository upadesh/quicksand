<!--template: content-link--> 
<article id="post-<?php the_ID(); ?>" <?php post_class("card"); ?>>

    <!--post video-->
    <?php
    quicksand_entry_excerpt();

    if (!is_singular()) {
        quicksand_entry_header_postformat_video();
    }
    quicksand_entry_title(); 
    quicksand_entry_meta();
    
    if (!is_singular()) {
        quicksand_the_entry_content_video();
    } else {
        quicksand_the_entry_content();
    } 

    quicksand_entry_tags();
    quicksand_author_biography(); 
    quicksand_edit_post();
    ?>    

</article><!-- .post-->