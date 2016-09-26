<?php

if (!function_exists('wp_bs_theme_simple_the_custom_logo')) :

    /**
     * Displays the optional custom logo
     *
     * if logo is not available it uses the default image
     *
     * @since WP-bs-theme-simple 0.0.1
     */
    function wp_bs_theme_simple_the_custom_logo() {
        if (function_exists('the_custom_logo')) :
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                // this is very very custom
                echo '<a href="/" class="custom-logo-link" rel="home" itemprop="url">'
                . '<img width="50" height="50" src="' . get_template_directory_uri() . '/img/logo.png" '
                . 'class="custom-logo" alt="logo" itemprop="logo" >'
                . '</a>';
            }
        endif;
    }




endif;
