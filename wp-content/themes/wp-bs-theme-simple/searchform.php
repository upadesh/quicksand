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
        <input type="text" class="form-control" placeholder="<?php echo _x('...', 'label', 'wp-bs-theme-simple'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
        <span class="input-group-btn"> 
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </span>
    </div> 
</form>