<?php
/**
 * Custom Quicksand template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Quicksand
 * @since Quicksand 0.2.1
 */
if (!function_exists('quicksand_entry_meta')) :

    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * Create your own quicksand_entry_meta() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_entry_meta() {
        echo '<div class="card-block entry-meta">';

        // date
        if (in_array(get_post_type(), array('post', 'attachment'))) {
            $quicksand_entry_date = get_quicksand_entry_date();
            echo $quicksand_entry_date;
        }

        // author
        $author = sprintf('<span class="post-author"><a href="%s">%s</a></span>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author());
        echo $author;

        // post-format
        $format = get_post_format();
        if (current_theme_supports('post-formats', $format)) {
            $post_format_string = sprintf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>', sprintf('<span class="screen-reader-text">%s </span>', _x('Format', 'Used before post format.', 'quicksand')), esc_url(get_post_format_link($format)), get_post_format_string($format));
            echo $post_format_string;
        }

        // taxonomies
        if ('post' === get_post_type()) {
            $quicksandEntryTaxonomies = get_quicksand_entry_taxonomies();
            echo $quicksandEntryTaxonomies['categories'];
//            echo $quicksandEntryTaxonomies['tags'];
        }

        // comments
        if (!is_singular() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', 'quicksand'), get_the_title()));
            echo '</span>';
        }
        echo "</div>";
    }

endif;


if (!function_exists('quicksand_entry_tags')) :

    /**
     * Prints HTML with date information for current post.
     *
     * Create your own quicksand_entry_tags() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_entry_tags() {
        $taxonomies = get_quicksand_entry_taxonomies();

        if (!empty($taxonomies['tags'])) {
            ?> 
            <div class="entry-footer card-footer text-muted"> 
                <?php echo $taxonomies['tags']; ?>
            </div>
            <?php
        }
    }

endif;



if (!function_exists('get_quicksand_entry_date')) :

    /**
     * Prints HTML with date information for current post.
     *
     * Create your own get_quicksand_entry_date() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function get_quicksand_entry_date() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        // Update-time:
//        if (get_the_time('U') !== get_the_modified_time('U')) {
//            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
//        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), get_the_date(), esc_attr(get_the_modified_date('c')), get_the_modified_date());

        return sprintf('<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>', _x('Posted on', 'Used before publish date.', 'quicksand'), esc_url(get_permalink()), $time_string
        );
    }

endif;


if (!function_exists('get_quicksand_entry_taxonomies')) :

    /**
     * Prints HTML with category and tags for current post.
     *
     * Create your own get_quicksand_entry_taxonomies() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function get_quicksand_entry_taxonomies() {
        $taxonomies = array(
            'categories' => NULL,
            'tags' => NULL,
        );

        $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'quicksand'));
        if ($categories_list && quicksand_categorized_blog()) {
            $taxonomies['categories'] = sprintf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Categories', 'Used before category names.', 'quicksand'), $categories_list
            );
        }

        $tag_list = get_the_tag_list('<span class="tag tag-pill tag-default">', '</span><span class="tag  tag-pill tag-default">', '</span>');
        if ($tag_list) {
            $taxonomies['tags'] = sprintf('<span class="tag-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Tags', 'Used before tag names.', 'quicksand'), $tag_list);
        }

        return $taxonomies;
    }

endif;




if (!function_exists('quicksand_entry_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own quicksand_entry_thumbnail() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_entry_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <!-- post-thumbnail: featured image --> 
            <div class="card-img-top post-thumbnail">   
                <?php the_post_thumbnail('post-thumbnail', array('class' => 'card-img-top img-fluid post-thumbnail')); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?> 
            <a class="card-img-top post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true"> 
                <?php
                the_post_thumbnail('quicksand-featured_image', array(
                    'alt' => the_title_attribute('echo=0'),
                    'class' => 'img-fluid'
                ));
                ?> 
            </a>

        <?php
        endif; // End is_singular()
    }

endif;


if (!function_exists('quicksand_entry_title')) :

    /**
     * Displays the title. 
     *
     * Create your own quicksand_entry_title() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title($class = 'entry-title') {
        ?>

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php _e('Featured', 'quicksand'); ?></span>
                <?php
            endif;

            if (is_singular()) :
                ?>
                <h1 class="card-title <?php echo $class; ?>"><?php the_title(); ?></h1> 

                <?php
            else :
                the_title(sprintf('<h1 class="card-title %s"><a href="%s" rel="bookmark">', esc_attr($class), esc_url(get_permalink())), '</a></h1>');
                ?> 
            <?php endif; ?>
        </header><!-- .entry-header --> 
        <?php
    }

endif;


if (!function_exists('quicksand_entry_title_postformat_link')) :

    /**
     * Displays the title for post-format: link 
     *
     * Create your own quicksand_entry_title_postformat_link() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_link($class = 'entry-title') {
        $class = esc_attr($class);
        ?> 

        <!-- entry-header --> 
        <header class="card-header entry-header">
            <!--stick post-->
            <?php if (is_sticky() && is_home() && !is_paged()) : ?>
                <span class="sticky-post"><?php _e('Featured', 'quicksand'); ?></span>
            <?php endif; ?>

            <div class="post-link">  
                <h1 class="card-title <?php echo $class; ?>">
                    <a href="<?php echo get_url_in_content(get_the_content()); ?>" target="_blank"><i class="fa fa-link" aria-hidden="true"></i> <?php the_title(); ?></a> 
                </h1> 
            </div><!-- .post-link -->
        </header><!-- .entry-header --> 
        <?php
    }

endif;




if (!function_exists('quicksand_entry_title_postformat_gallery')) :

    /**
     * Displays the title for post-format: galllery 
     *
     * Create your own quicksand_entry_title_postformat_gallery() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $class Optional. Class string of the header element.  
     */
    function quicksand_entry_title_postformat_gallery($class = 'quicksand-post-gallery') {
        global $post;

        // Make sure the post has a gallery in it
        if (!has_shortcode($post->post_content, 'gallery'))
            return $content;

        // get gallery-images
        // we don't use 'get_post_gallery images' in here, because it returns the thumbnails as well
        $gallery = get_post_gallery($post, false);
        $images = array();

        if (isset($gallery['ids'])) {
            $ids = explode(",", $gallery['ids']);

            foreach ($ids as $id) {
                $images[] = wp_get_attachment_url($id);
            }
        }
        ?>  

        <!-- entry-header --> 
        <header class="card-header entry-header <?php echo esc_attr($class); ?>"> 
            <div class="flexslider">
                <ul class="slides"> 
                    <?php
                    // Loop through each image in each gallery
                    foreach ($images as $image_url) {
                        echo '<li>' . '<img src="' . $image_url . '">' . '</li>';
                    }
                    ?> 
                </ul>
            </div><!-- .flexslider -->  
        </header><!-- .entry-header --> 
        <?php
    }

endif;




if (!function_exists('quicksand_entry_content_single')) :

    /**
     * Displays the content. 
     *
     * Create your own quicksand_entry_content_single() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $class Optional. Class string of the div element.  
     */
    function quicksand_entry_content_single($class = 'entry-content') {
        $class = esc_attr($class);
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
//                get_template_part('template-parts/content-single', get_post_format());
//                break;
//            break;
            case 'link':
            // content-link will display the link inside the header, so in list-view just display the default content
            case 'gallery':
                // strip gallery-shortcode in list-view, because gallery is shown inside header as slider
                if (!is_singular()) {
                    add_filter('the_content', 'remove_shortcode_from');
                    ?>
                    <div class="card-block  <?php echo $class; ?>"> 
                        <a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
                        <p class="card-text"><?php the_content(); ?></p>
                    </div>  
                    <?php
                    remove_filter('the_content', 'remove_shortcode_from');
                    break;
                }
//        case 'status':
//            break;
//        case 'audio':
//            break;
//        case 'chat':
//            break; 
            default:
                ?>  
                <!--the default post-format-->
                <div class="card-block  <?php echo $class; ?>"> 
                    <p class="card-text"><?php echo the_content(); ?></p>
                </div>  

                <!--displays page links for paginated posts (i.e. includes the <!–nextpage–>)--> 
                <?php
                quicksand_paginated_posts_paginator();
        }
    }

endif;




if (!function_exists('quicksand_paginated_posts_paginator')) :

    /**
     * Displays page links for paginated posts (i.e. includes the <!–nextpage–>)
     *
     * Create your own quicksand_paginated_posts_paginator() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_paginated_posts_paginator() {
        wp_link_pages(array(
            'before' => '<div class="card-block page-links"><span class="card-text page-links-title">' . __('Pages:', 'quicksand') . '</span>',
            'after' => '</div>',
            'link_before' => '<span class="card-link paged-link">',
            'link_after' => '</span>',
            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'quicksand') . ' </span>%',
            'separator' => '<span class="screen-reader-text">, </span>',
        ));
    }

endif;




if (!function_exists('quicksand_bs_style_paginator')) :

    /**
     * Displays bs-style pagination 
     *
     * Create your own quicksand_paginated_posts_paginator() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_bs_style_paginator() {
        ?>
        <div class="bs-pagination">
            <?php
            // navigation: post-list 
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '<i class="fa fa-backward" aria-hidden="true"></i>',
                'next_text' => '<i class="fa fa-forward" aria-hidden="true"></i>',
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'quicksand') . ' </span>',
            ));
            ?>
        </div>

        <?php
    }

endif;



if (!function_exists('quicksand_edit_post')) :

    /**
     * edit-link for logged in users & maybe more
     *
     * Create your own quicksand_edit_post() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_edit_post() {
        if (current_user_can('edit_posts', get_the_ID())) :
            ?>
            <div class="entry-footer card-footer text-muted">
                <?php
                edit_post_link(
                        sprintf(
                                /* translators: %s: Name of current post */
                                __('Edit<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title()
                        ), '<span class="card-link edit-link">', '</span>'
                );
                ?>
            </div><!-- .entry-footer -->
            <?php
        endif;
    }

endif;


if (!function_exists('quicksand_author_biography')) :

    /**
     * Displays the author biography. 
     *
     * Create your own quicksand_author_biography() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_author_biography() {
        if ('' !== get_the_author_meta('description')) :
            get_template_part('template-parts/biography');
        endif;
    }

endif;




if (!function_exists('quicksand_entry_excerpt')) :

    /**
     * Displays the optional excerpt. 
     *
     * Create your own quicksand_entry_excerpt() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
     */
    function quicksand_entry_excerpt($class = 'entry-summary') {
        $class = esc_attr($class);

        if (has_excerpt()) :
            ?>
            <div class="card-block <?php echo $class; ?>">
                <span class="card-text"><?php the_excerpt(); ?></span>
            </div>  
            <?php
        endif;
    }

endif;




//TODO: card -> wo ist ein bsp????
if (!function_exists('quicksand_entry_excerpt_more') && !is_admin()) :

    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ... and
     * a 'Continue reading' link.
     *
     * Create your own quicksand_entry_excerpt_more() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @return string 'Continue reading' link prepended with an ellipsis.
     */
    function quicksand_entry_excerpt_more() {
        $link = sprintf('<a href="%1$s" class="more-link">%2$s</a>', esc_url(get_permalink(get_the_ID())),
                /* translators: %s: Name of current post */ sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'quicksand'), get_the_title(get_the_ID()))
        );
        return ' &hellip; ' . $link;
    }

    add_filter('excerpt_more', 'quicksand_entry_excerpt_more');
endif;


if (!function_exists('quicksand_categorized_blog')) :

    /**
     * Determines whether blog/site has more than one category.
     *
     * Create your own quicksand_categorized_blog() function to override in a child theme.
     *
     * @since Quicksand 0.2.1
     *
     * @return bool True if there is more than one category, false otherwise.
     */
    function quicksand_categorized_blog() {
        if (false === ( $all_the_cool_cats = get_transient('quicksand_categories') )) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields' => 'ids',
                // We only need to know if there is more than one category.
                'number' => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('quicksand_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so quicksand_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so quicksand_categorized_blog should return false.
            return false;
        }
    }

endif;

/**
 * Flushes out the transients used in quicksand_categorized_blog().
 *
 * @since Quicksand 0.2.1
 */
function quicksand_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('quicksand_categories');
}

add_action('edit_category', 'quicksand_category_transient_flusher');
add_action('save_post', 'quicksand_category_transient_flusher');



if (!function_exists('quicksand_the_custom_logo')) :

    /**
     * Displays the optional custom logo 
     *
     * @since Quicksand 0.2.1
     */
    function quicksand_the_custom_logo() {
        if (function_exists('the_custom_logo')) :
            if (has_custom_logo()) {
                the_custom_logo();
            }
        endif;
    }






















































    
endif;