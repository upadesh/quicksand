<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


            </div><!-- site-content-->


            <!-- site-footer -->
            <footer class="site-footer">  
                <!-- site-widgetbar -->
                <div class="site-widgetbar">
                    <div class="row">
                        <div class="site-widget-item text-xs-center">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="tag tag-default tag-pill pull-xs-right">14</span>
                                    Cras justo odio
                                </li>
                                <li class="list-group-item">
                                    <span class="tag tag-default tag-pill pull-xs-right">2</span>
                                    Dapibus ac facilisis in
                                </li>
                                <li class="list-group-item">
                                    <span class="tag tag-default tag-pill pull-xs-right">1</span>
                                    Morbi leo risus
                                </li>
                            </ul>
                        </div> 
                        <div class="site-widget-item text-xs-center"></div>  
                        <div class="site-widget-item text-xs-center"></div>  
                        <div class="site-widget-item text-xs-center"></div>  
                    </div><!-- .row -->
                </div><!-- .site-widgetbar -->  
            </footer><!-- .site-footer -->

        </div><!-- .site-main-container -->


        <!-- site-info -->
        <div class="container-fluid">
            <div class="site-info">
                <div class="row">
                    <div class="site-social">
                        <div class="text-xs-center text-lg-right"> 
                            <ul class="list-inline">
                                <li class="d-inline">
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="d-inline">
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul> 
                        </div>
                    </div>
                    <div class="site-copyright ">
                        <div class="site-info text-xs-center text-lg-left">
                            <p class="text-muted lead">Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>2016</p>
                        </div>
                    </div>
                </div>
            </div><!-- site-info -->
        </div>
    </body>
</html>