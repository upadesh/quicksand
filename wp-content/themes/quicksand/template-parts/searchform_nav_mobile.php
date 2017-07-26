
<!--searchform in navbar-mobile-->
<div class="nav-searchform-mobile hidden-md-up">
    <div class="card"> 
        <div class="card-block"> 
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>"> 
                <div class="form-group"> 
                    <input id="quicksand-top-search-form-mobile" type="text" class="form-control" placeholder="<?php echo esc_html_x('Search ...', 'label', 'quicksand'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
                </div>
                <button type="submit" class="btn btn-secondary nav-search-mobile-submit"><?php esc_html_e('Search', 'quicksand'); ?></button>
            </form>
        </div>
    </div>
</div>