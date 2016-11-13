<!--template: navigation-primary--> 
<?php
$primary_nav_options = array(
    'theme_location' => 'primary',
    'depth' => 2,
    'container' => '',
    'container_class' => '',
    'menu_class' => 'nav navbar-nav',
    'fallback_cb' => 'QuicksandNavwalker::fallback',
    'walker' => new QuicksandNavwalker()
);
?> 

<div class="site-navigation"> 
    <nav class="navbar navbar-light bg-faded site-nav">
        <button class="navbar-toggler hidden-md-up float-md-left" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsing-navbar" aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <!--search & close buttons in mobile-->
        <div class="nav-search-mobile-wrapper float-xs-right"> 
            <a class="btn btn-secondary nav-search-close-mobile hidden-xs-up" href="#" aria-label="close">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a> 
            <a class="btn btn-secondary nav-search-mobile hidden-md-up"  href="#" aria-label="search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a> 
        </div>



        <!--searchform in navbar-mobile-->
        <div class="nav-searchform-mobile hidden-md-up">  
            <div class="card"> 
                <div class="card-block"> 
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>"> 
                        <div class="form-group"> 
                            <input type="text" class="form-control" placeholder="<?php echo _x('Search ...', 'label', 'quicksand'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
                        </div>
                        <button type="submit" class="btn btn-secondary nav-search-mobile-submit"><?php _e('Search', 'quicksand'); ?></button>
                    </form>
                </div>
            </div>
        </div>



        <div class="collapse navbar-toggleable-sm" id="collapsing-navbar">

            <!--searchform in navbar-->
            <div class="nav-searchform hidden-xs-up"> 
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <div class="input-group">
                        <input id="quicksand-top-search-form" type="text" class="form-control" placeholder="<?php echo _x('Search ...', 'label', 'quicksand'); ?>" value="<?php echo get_search_query(); ?>" name="s" >
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


            <!--standard navigation-->
            <div class="nav-content">
                <?php
                if (function_exists('the_custom_logo')) :
                    if (has_custom_logo()) {
                        ?> 
                        <div class="navbar-brand" href="/">
                            <?php quicksand_the_custom_logo(); ?>
                        </div> 
                        <?php
                    } else {
                        ?>  
                        <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" ><?php echo esc_html(get_theme_mod('qs_nav_logo_text', '')) ?></a>
                        <?php
                    }
                endif;
                ?>
                <div class="nav-wrapper"> 
                    <?php wp_nav_menu($primary_nav_options); ?>   
                </div>
                <div class="nav-search-wrapper hidden-sm-down"> 
                    <a class="btn btn-secondary nav-search" href="#" aria-label="search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a> 
                </div>
            </div> 

        </div>
    </nav>
</div><!-- .site-navigation -->  
