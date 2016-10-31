<!--template: navigation-primary-->
<?php if (has_nav_menu('primary')) : ?>

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
            <button class="navbar-toggler hidden-md-up pull-md-left" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsing-navbar" aria-expanded="false" aria-label="Toggle navigation">
                &#9776;
            </button>
            <div class="nav-search-mobile-wrapper float-xs-right"> 
                <a class="btn btn-secondary nav-search-mobile hidden-md-up"  href="#" aria-label="search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a> 
            </div>

            <div class="collapse navbar-toggleable-sm" id="collapsing-navbar">
                <div class="nav-content">
                    <!--<a class="navbar-brand" href="#">Navbar</a>-->
                    <?php
                    if (function_exists('the_custom_logo')) :
                        if (has_custom_logo()) {
                            ?> 
                            <div class="navbar-brand" href="/">
                                <?php quicksand_the_custom_logo(); ?>
                            </div> 
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

<?php endif; ?>