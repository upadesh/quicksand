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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- entry-header --> 
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <!--post-meta--> 
    <?php quicksand_entry_meta(); ?>

    <!--post excerpt-->
    <?php quicksand_excerpt(); ?>

    <!--post thumbnail-->
    <?php quicksand_post_thumbnail(); ?>


    <?php
    $format = get_post_format();

    // include here your special template
    switch ($format) {
//        case 'aside':
//            break;
//        case 'image':
//            break;
//        case 'video':
//            break;
//        case 'quote':
//            break;
        case 'link': 
            get_template_part('template-parts/content-single', get_post_format());
            break;
//        case 'gallery':
//            break;
//        case 'status':
//            break;
//        case 'audio':
//            break;
//        case 'chat':
//            break; 
        default:
            ?> 

            <!-- .entry-content --> 
            <div class="entry-content">  
                <?php
                the_content();

                // paged posts
                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'quicksand') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span class="paged-link">',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . __('Page', 'quicksand') . ' </span>%',
                    'separator' => '<span class="screen-reader-text">, </span>',
                ));

                if ('' !== get_the_author_meta('description')) {
                    get_template_part('template-parts/biography');
                }
                ?> 
            </div><!-- .entry-content -->  

            <?php
            break;
    }
    ?>  

    <!-- .entry-footer --> 
    <footer class="entry-footer">
        <?php
        edit_post_link(
                sprintf(
                        /* translators: %s: Name of current post */
                        __('Edit<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- .post-->  

