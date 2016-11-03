<?php
// Create Slider
$slider_cat = get_theme_mod('qs_slider_category', '');

// if no catgeory is selected, do nothing
if (empty($slider_cat)) {
    return;
}

$slider_count = get_theme_mod('qs_slides_count', '4');

// only find posts with a featured image
$the_query = new WP_Query(array(
    'cat' => $slider_cat, 
    'showposts' => $slider_count,
    'meta_query' => array(
        array(
         'key' => '_thumbnail_id',
         'compare' => 'EXISTS'
        ),
    )
        )); 

// Check if the Query returns any posts
if ($the_query->have_posts()) {
    ?>
    <div class="flexslider">
        <ul class="slides">

            <?php
            // The Loop
            while ($the_query->have_posts()) : $the_query->the_post();
                echo '<li><a href="' . get_permalink() . '">';
                if ((function_exists('has_post_thumbnail')) && ( has_post_thumbnail() )) :
                    echo get_the_post_thumbnail();
                endif;

                echo '<div class="flex-caption">';
                if (!empty(get_the_title()))
                    echo '<h2 class="entry-title">' . get_the_title() . '</h2>';
                if (!empty(get_the_excerpt()))
                    echo '<div class="excerpt">' . get_the_excerpt() . '</div>';
                echo '</div>';
                echo '</a></li>';
            endwhile;
            ?>

        </ul><!-- .slides -->
    </div><!-- .flexslider -->

    <?php
}

// Reset Post Data
wp_reset_postdata();
