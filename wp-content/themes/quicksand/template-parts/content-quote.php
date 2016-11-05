<!--template: content-quote--> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    quicksand_entry_excerpt();

    if (!is_singular()) {
        quicksand_entry_header_postformat_quote();
    } else { 
        quicksand_entry_title();
        quicksand_entry_meta();
        quicksand_the_entry_content();
        quicksand_entry_tags();
    }

    quicksand_edit_post();
    ?>   

</article><!-- .post-->  