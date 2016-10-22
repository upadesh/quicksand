<?php
/**
 * The template part for displaying single posts
 * 
 * Include here also custom templates for the various post-foramts, e.g.:
 *  content-single.-gallery.php
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
?>




<!--template: content-single--> 
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
    <?php quicksand_single_entry_content(); ?>

    <!--author-biography-->
    <?php quicksand_author_biography(); ?>

    <!--edit-link-->
    <?php quicksand_edit_post(); ?> 

</article><!-- .post-->  

