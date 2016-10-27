<?php
/**
 * Template for displaying search forms in Quicksand
 *
 * @package WordPress
 * @subpackage quicksand
 * @since Quicksand 0.2.1
 */
?>

<!--template: searchform-->
<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="<?php echo _x('', 'label', 'quicksand'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
        <span class="input-group-btn"> 
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search fa-lg"></i>
            </button>
        </span>
    </div> 
</form>