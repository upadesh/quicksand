
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
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img alt="Brand" src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
                </a>
            </div>
            <div class="pull-xs-right"> 
                <?php wp_nav_menu($primary_nav_options); ?> 
            </div>
        </div> 
    </nav>
</div><!-- .site-navigation -->  