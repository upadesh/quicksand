<!--Not needed right now, only if you choose to include meta-data via get-template-part()-->

<!--template: postmeta-->
<!-- .post-meta --> 
<div class="post-meta">
    <?php if (has_category()) : ?>
        <p class="text-right">
            <span class="fa fa-chevron-circle-right"></span><?php _e('Posted In', 'wp-bs-theme-simple'); ?>: <?php the_category(__(', ', 'wp-bs-theme-simple')); ?>
        </p>
    <?php endif; ?>
    <?php if (has_tag()) : ?>
        <p class="text-right">
            <span class="fa fa-tags"></span><?php the_tags(); ?> 
        </p>
    <?php endif; ?> 
    <p>
        <span class="fa fa-user"></span> <?php the_author_posts_link(); ?>
        <span class="fa fa-clock-o"></span><?php the_time(get_option('date_format')); ?>
    </p> 
    <p>
        <span class="fa fa-comments"></span>
        <a href="<?php comments_link(); ?>">
            <?php comments_number( 'no responses', 'one response', '% responses' ); ?>
        </a>
    </p>
</div><!-- .post-meta -->  