<?php
/**
 * Template for displaying search forms in WP-bs-theme-simple
 *
 * @package WordPress
 * @subpackage wp-bs-theme-simple
 * @since WP-bs-theme-simple 0.0.1
 */
?>

<!--template: searchform-->
<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="<?php echo _x( 'Search for:', 'label', 'wp-bs-theme-simple' ); ?>" value="<?php echo get_search_query(); ?>" name="s" >
            <span class="input-group-btn"> 
                <button class="btn btn-secondary" type="submit">
                    <span class=""><?php echo _x( 'Search', 'submit button', 'wp-bs-theme-simple' ); ?></span>
                    <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'wp-bs-theme-simple' ); ?></span>
                </button>
            </span>
        </div>
    </div>
</form>