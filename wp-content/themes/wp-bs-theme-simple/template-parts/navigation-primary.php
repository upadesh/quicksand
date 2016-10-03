<!--template: navigation-primary-->
<?php if (has_nav_menu('primary')) : ?>

    <?php
    $primary_nav_options = array(
        'theme_location' => 'primary',
        'depth' => 2,
        'container' => '',
        'container_class' => '',
        'menu_class' => 'nav navbar-nav',
        'fallback_cb' => 'WP_bs_theme_simple_navwalker::fallback',
        'walker' => new WP_bs_theme_simple_navbar_navwalker()
    );
    ?> 

    <div class="site-navigation"> 
        <nav class="navbar navbar-light bg-faded site-nav">
            <button class="navbar-toggler hidden-lg-up pull-xs-right" type="button" data-toggle="collapse" data-target="#collapsing-navbar" aria-controls="collapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
                &#9776;
            </button>

            <div class="collapse navbar-toggleable-md" id="collapsing-navbar">
                <!--<a class="navbar-brand" href="#">Navbar</a>-->
                <?php
                if (function_exists('the_custom_logo')) :
                    if (has_custom_logo()) {
                        ?>
                        <div class="navbar-header">
                            <div class="navbar-brand" href="/">
                                <?php wp_bs_theme_simple_the_custom_logo(); ?>
                            </div>
                        </div>
                        <?php
                    }
                endif;
                ?>
                <div class="nav-wrapper pull-xs-right"> 
                    <?php wp_nav_menu($primary_nav_options); ?> 
                </div>
            </div> 
        </nav>
    </div><!-- .site-navigation -->  

<?php endif; ?>