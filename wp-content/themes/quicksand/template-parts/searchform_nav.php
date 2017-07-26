
<!--searchform in navbar-->
<div class="nav-searchform hidden-xs-up">
    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="input-group">
            <input id="quicksand-top-search-form" type="text" class="form-control" placeholder="<?php echo esc_html_x('Search ...', 'label', 'quicksand'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
            <span class="input-group-btn"> 
                <button class="btn btn-secondary nav-search-submit" type="submit">
                    <i class="fa fa-search fa-lg"></i>
                </button>
                <a class="btn btn-secondary nav-search-cancel">
                    <i class="fa fa-times fa-lg"></i>
                </a>
            </span> 
        </div>
    </form> 
</div>