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

            <div class="collapse navbar-toggleable-sm" id="collapsing-navbar">
                <!--<a class="navbar-brand" href="#">Navbar</a>-->
                <?php
                if (function_exists('the_custom_logo')) :
                    if (has_custom_logo()) {
                        ?>
                        <div class="navbar-header">
                            <div class="navbar-brand" href="/">
                                <?php quicksand_the_custom_logo(); ?>
                            </div>
                        </div>
                        <?php
                    }
                endif;
                ?>
                <div class="nav-wrapper pull-sm-left pull-md-right"> 
                    <?php wp_nav_menu($primary_nav_options); ?> 
                </div>
            </div> 
        </nav>
    </div><!-- .site-navigation -->  

<?php endif; ?>