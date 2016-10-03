<?php
/**
 * The template part for displaying single posts
 * 
 * Include here also custom templates for the various post-foramts, e.g.:
 *  content-single.-gallery.php
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>

<!--template: content-single--> 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- entry-header --> 
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <!--post-meta--> 
    <?php wp_bs_theme_simple_entry_meta(); ?>

    <!--post excerpt-->
    <?php wp_bs_theme_simple_excerpt(); ?>

    <!--post thumbnail-->
    <?php wp_bs_theme_simple_post_thumbnail(); ?>


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

                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'wp-bs-theme-simple') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wp-bs-theme-simple') . ' </span>%',
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
                        __('Edit<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title()
                ), '<span class="edit-link">', '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- .post-->  

