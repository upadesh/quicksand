<!--template: content-->
<!-- post --> 
<article class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>   
    <!--post thumbnail-->
    <?php quicksand_entry_thumbnail(); ?> 

    <!--post excerpt-->
    <?php quicksand_entry_excerpt(); ?> 

    <!--post title-->
    <?php quicksand_entry_title(); ?>

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post-content--> 
    <?php quicksand_the_entry_content(); ?> 
    
    <!--edit-link-->
    <?php quicksand_entry_tags(); ?> 
    
    <!--author-bio-->
    <?php quicksand_author_biography(); ?> 
    
    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  