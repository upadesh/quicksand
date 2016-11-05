<!--template: content-link--> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!--post video-->
    <?php
    quicksand_entry_excerpt();

    if (!is_singular()) {
        quicksand_entry_header_postformat_video();
    }
    quicksand_entry_title();

//    if (is_singular()) {
        quicksand_entry_meta();
        quicksand_entry_content();
//    }

    quicksand_entry_tags();
    quicksand_edit_post();
    ?>    

</article><!-- .post-->