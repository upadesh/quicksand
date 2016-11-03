<?php
// Create Slider 


$slider_cat = get_theme_mod('slider_setting', '');
 
if (empty($slider_cat)) {
    return;
}

$slider_count = get_theme_mod('count_setting', '4');
$the_query = new WP_Query(array('cat' => $slider_cat, 'showposts' => $slider_count));


// Check if the Query returns any posts
if ($the_query->have_posts()) {

    // Start the Slider 
    ?>
    <div class="flexslider">
        <ul class="slides">

            <?php
            // The Loop
            while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                <li>

                    <?php
                    // Check if there's a Slide URL given and if so let's a link to it
                    if (get_post_meta(get_the_id(), 'quicksand_slideurl', true) != '') {
                        ?>
                    <!--TODO: permlink-->
                        <a href="<?php echo esc_url(get_post_meta(get_the_id(), 'quicksand_slideurl', true)); ?>">
                            <?php
                        }

                        // The Slide's Image
                        echo the_post_thumbnail();

                        // Close off the Slide's Link if there is one
                        if (get_post_meta(get_the_id(), 'quicksand_slideurl', true) != '') {
                            ?>
                        </a>
                    <?php } ?>

                </li>
            <?php endwhile; ?>

        </ul><!-- .slides -->
    </div><!-- .flexslider -->

    <?php
}

// Reset Post Data
wp_reset_postdata();
