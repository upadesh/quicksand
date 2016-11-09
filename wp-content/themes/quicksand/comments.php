<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<!--template: comments-->
<div class="card">
    <div class="card-header comments-title">

        <?php
        $comments_number = get_comments_number();
        if (1 === $comments_number) {
            /* translators: %s: post title */
            printf(_x('One thought on &ldquo;%s&rdquo;', 'comments title', 'quicksand'), get_the_title());
        } else {
            printf(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                            '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comments_number, 'comments title', 'quicksand'
                    ), number_format_i18n($comments_number), get_the_title()
            );
        }
        ?>
    </div>
    <div id="comments" class="card-block comments-area">

        <?php if (have_comments()) : ?>   
            <ol class="comment-list">
                <?php
                wp_list_comments(array(
                    'style' => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 42,
//                    TODO: see for a working example
//                        http://www.studiograsshopper.ch/code-snippets/customising-wp_list_comments/
//                    'callback' => 'quicksand_comment'
                ));
                ?>
            </ol><!-- .comment-list -->

            <?php
            the_comments_navigation(array(
                'prev_text' => __('Older Comments', 'quicksand'),
                'next_text' => __('Newer Comments', 'quicksand'),
            ));
            ?>

        <?php endif; // Check for have_comments().   ?>

        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
            ?>
            <p class="card-text no-comments"><?php _e('Comments are closed.', 'quicksand'); ?></p>
        <?php endif; ?> 

        <?php
        comment_form(
                array('fields' => apply_filters('comment_form_default_fields', array())));
        ?>

    </div><!-- .comments-area -->
</div>