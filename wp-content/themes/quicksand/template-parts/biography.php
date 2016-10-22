<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Quicksand
 * @since Quicksand 0.2.1
 */
?> 


<div class="list-group list-group-flush author-bio"> 
        <li class="list-group-item"> 
            <?php
            /**
             * Filter the Quicksand author bio avatar size.
             *
             * @since Quicksand 0.2.1
             *
             * @param int $size The avatar height and width size in pixels.
             */
            $author_bio_avatar_size = apply_filters('quicksand_author_bio_avatar_size', 42);

            echo get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size);
            ?>
            <!-- end avatar -->

            <!-- user bio -->
            <div class="author-bio-content">

                <h4 class="card-title author-name"><?php echo get_the_author(); ?></h4>
                <p class="card-text author-description"> 
                    <?php the_author_meta('description'); ?>
                </p>  
                <p>
                    <a class="card-link author-link" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
                        <?php printf(__('View all posts by %s', 'quicksand'), get_the_author()); ?>
                    </a>
                </p>
            </div><!-- end .author-bio-content -->
        </li> 
</div>   