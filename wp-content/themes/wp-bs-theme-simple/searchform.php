<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="<?php _e('Search for...', 'wp-bs-theme-simple'); ?>" value="" name="s" >
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
            </span>
        </div>
    </div>
</form>