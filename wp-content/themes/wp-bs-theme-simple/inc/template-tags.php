<?php
/**
 * Custom WP-bs-theme-simple template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage WP-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
if (!function_exists('wp_bs_theme_simple_entry_meta')) :

    /**
     * Prints HTML with meta information for the categories, tags.
     *
     * Create your own wp_bs_theme_simple_entry_meta() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_entry_meta() {
        if ('post' === get_post_type()) {
            $author_avatar_size = apply_filters('wp_bs_theme_simple_author_avatar_size', 49);
            printf('<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>', get_avatar(get_the_author_meta('user_email'), $author_avatar_size), _x('Author', 'Used before post author name.', 'wp-bs-theme-simple'), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()
            );
        }

        if (in_array(get_post_type(), array('post', 'attachment'))) {
            wp_bs_theme_simple_entry_date();
        }

        $format = get_post_format();
        if (current_theme_supports('post-formats', $format)) {
            printf('<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>', sprintf('<span class="screen-reader-text">%s </span>', _x('Format', 'Used before post format.', 'wp-bs-theme-simple')), esc_url(get_post_format_link($format)), get_post_format_string($format)
            );
        }

        if ('post' === get_post_type()) {
            wp_bs_theme_simple_entry_taxonomies();
        }

        if (!is_singular() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(sprintf(__('Leave a comment<span class="screen-reader-text"> on %s</span>', 'wp-bs-theme-simple'), get_the_title()));
            echo '</span>';
        }
    }

endif;


if (!function_exists('wp_bs_theme_simple_entry_date')) :

    /**
     * Prints HTML with date information for current post.
     *
     * Create your own wp_bs_theme_simple_entry_date() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_entry_date() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), get_the_date(), esc_attr(get_the_modified_date('c')), get_the_modified_date());

        printf('<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>', _x('Posted on', 'Used before publish date.', 'wp_bs_theme_simple'), esc_url(get_permalink()), $time_string
        );
    }

endif;

if (!function_exists('wp_bs_theme_simple_entry_taxonomies')) :

    /**
     * Prints HTML with category and tags for current post.
     *
     * Create your own wp_bs_theme_simple_entry_taxonomies() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_entry_taxonomies() {
        $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'wp_bs_theme_simple'));
        if ($categories_list && wp_bs_theme_simple_categorized_blog()) {
            printf('<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Categories', 'Used before category names.', 'wp_bs_theme_simple'), $categories_list
            );
        }

        $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'wp_bs_theme_simple'));
        if ($tags_list) {
            printf('<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>', _x('Tags', 'Used before tag names.', 'wp_bs_theme_simple'), $tags_list
            );
        }
    }

endif;




if (!function_exists('wp_bs_theme_simple_post_thumbnail')) :

    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * Create your own wp_bs_theme_simple_post_thumbnail() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 1.0
     */
    function wp_bs_theme_simple_post_thumbnail() {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <!-- post-thumbnail --> 
            <div class="post-thumbnail">   
                <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                <?php
                the_post_thumbnail('post-thumbnail', array(
                    'alt' => the_title_attribute('echo=0'),
                    'class' => 'img-fluid'
                        )
                );
                ?>
            </a>

        <?php
        endif; // End is_singular()
    }

endif;


if (!function_exists('wp_bs_theme_simple_excerpt')) :

    /**
     * Displays the optional excerpt.
     *
     * Wraps the excerpt in a div element.
     *
     * Create your own wp_bs_theme_simple_excerpt() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
     */
    function wp_bs_theme_simple_excerpt($class = 'entry-summary') {
        $class = esc_attr($class);

        if (has_excerpt() || is_search()) :
            ?>
            <div class="<?php echo $class; ?>">
                <?php the_excerpt(); ?>
            </div><!-- .<?php echo $class; ?> -->
            <?php
        endif;
    }

endif;

if (!function_exists('wp_bs_theme_simple_excerpt_more') && !is_admin()) :

    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ... and
     * a 'Continue reading' link.
     *
     * Create your own wp_bs_theme_simple_excerpt_more() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @return string 'Continue reading' link prepended with an ellipsis.
     */
    function wp_bs_theme_simple_excerpt_more() {
        $link = sprintf('<a href="%1$s" class="more-link">%2$s</a>', esc_url(get_permalink(get_the_ID())),
                /* translators: %s: Name of current post */ sprintf(__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'wp-bs-theme-simple'), get_the_title(get_the_ID()))
        );
        return ' &hellip; ' . $link;
    }

    add_filter('excerpt_more', 'wp_bs_theme_simple_excerpt_more');
endif;


if (!function_exists('wp_bs_theme_simple_categorized_blog')) :

    /**
     * Determines whether blog/site has more than one category.
     *
     * Create your own wp_bs_theme_simple_categorized_blog() function to override in a child theme.
     *
     * @since WP-bs-theme-simple 0.0.1
     *
     * @return bool True if there is more than one category, false otherwise.
     */
    function wp_bs_theme_simple_categorized_blog() {
        if (false === ( $all_the_cool_cats = get_transient('wp_bs_theme_simple_categories') )) {
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields' => 'ids',
                // We only need to know if there is more than one category.
                'number' => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('wp_bs_theme_simple_categories', $all_the_cool_cats);
        }

        if ($all_the_cool_cats > 1) {
            // This blog has more than 1 category so wp_bs_theme_simple_categorized_blog should return true.
            return true;
        } else {
            // This blog has only 1 category so wp_bs_theme_simple_categorized_blog should return false.
            return false;
        }
    }

endif;

/**
 * Flushes out the transients used in wp_bs_theme_simple_categorized_blog().
 *
 * @since WP-bs-theme-simple 0.0.1
 */
function wp_bs_theme_simple_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('wp_bs_theme_simple_categories');
}

add_action('edit_category', 'wp_bs_theme_simple_category_transient_flusher');
add_action('save_post', 'wp_bs_theme_simple_category_transient_flusher');



if (!function_exists('wp_bs_theme_simple_the_custom_logo')) :

    /**
     * Displays the optional custom logo
     *
     * if logo is not available it uses the default image
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_the_custom_logo() {
        if (function_exists('the_custom_logo')) :
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                // this is very very custom
                echo '<a href="/" class="custom-logo-link" rel="home" itemprop="url">'
                . '<img width="50" height="50" src="' . get_template_directory_uri() . '/img/logo.png" '
                . 'class="custom-logo" alt="logo" itemprop="logo" >'
                . '</a>';
            }
        endif;
    }

endif;

/**
 * integrate a scoial-media-menu
 * 
 * @see https://www.competethemes.com/blog/social-icons-wordpress-menu-theme-customizer/
 * 
 * @return string
 */
function wp_bs_theme_simple_social_media_array() {
    /* store social site names in array */
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

    return $social_sites;
}

function wp_bs_theme_simple_add_social_sites_customizer($wp_customize) {

    $wp_customize->add_section('wp_bs_theme_simple_social_settings', array(
        'title' => __('Social Media Icons', 'text-domain'),
        'priority' => 35,
    ));

    $social_sites = wp_bs_theme_simple_social_media_array();
    $priority = 5;

    foreach ($social_sites as $social_site) {

        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'text-domain'),
            'section' => 'wp_bs_theme_simple_social_settings',
            'type' => 'text',
            'priority' => $priority,
        ));

        $priority = $priority + 5;
    }
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'wp_bs_theme_simple_add_social_sites_customizer');


/* template-tag:
 * 
 * takes user input from the customizer and outputs linked social media icons 
 */

function wp_bs_theme_simple_social_media_icons() {

    $social_sites = wp_bs_theme_simple_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }

    /* for each active social site, add it as a list item */
    if (!empty($active_sites)) {
        echo '<ul class="list-inline">';

        foreach ($active_sites as $active_site) {

            /* setup the class */
            $class = 'fa fa-' . $active_site;

            if ($active_site == 'email') {
                ?>                 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
            <?php } else { ?> 
                <li class="d-inline">
                    <a  class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url(get_theme_mod($active_site)); ?>">
                        <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo esc_attr($class); ?> fa-stack-1x fa-inverse" title="<?php printf(__('%s icon', 'text-domain'), $active_site); ?>"></i>
                        </span>
                    </a>
                </li> 
                <?php
            }
        }
        echo "</ul>";
    }
}
