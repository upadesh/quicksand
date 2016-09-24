<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>


                    <!--  site-sidebar  -->
                    <aside id="secondary" class="site-sidebar widget-area"> 

                        <section id="search-2" class="widget widget_search">
                            <form role="search" method="get" class="search-form" action="http://wp.local/">
                                <div class="input-group">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search for..." value="" name="s" >
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <section id="recent-posts-2" class="widget widget_recent_entries">	
                            <h2 class="widget-title">Recent Posts</h2>		
                            <ul>
                                <li>
                                    <a href="http://wp.local/?p=1704">Whatever</a>
                                </li>
                                <li>
                                    <a href="http://wp.local/?p=1">Hello world!</a>
                                </li>
                                <li>
                                    <a href="http://wp.local/?p=1178">Markup: HTML Tags and Formatting</a>
                                </li>
                                <li>
                                    <a href="http://wp.local/?p=1177">Markup: Image Alignment</a>
                                </li>
                                <li>
                                    <a href="http://wp.local/?p=1176">Markup: Text Alignment</a>
                                </li>
                            </ul>
                        </section>
                        
                        <section id="recent-comments-2" class="widget widget_recent_comments">
                            <h2>Recent Comments</h2>
                            <ul id="recentcomments">
                                <li class="recentcomments">
                                    <span class="comment-author-link">ddd</span> on <a href="http://wp.local/?p=1704#comment-32">Whatever</a>
                                </li>
                                <li class="recentcomments">
                                    <span class="comment-author-link">admin</span> on <a href="http://wp.local/?p=1704#comment-31">Whatever</a>
                                </li>
                                <li class="recentcomments">
                                    <span class="comment-author-link"><a href='https://wordpress.org/' rel='external nofollow' class='url'>A WordPress Commenter</a></span> on <a href="http://wp.local/?p=1#comment-1">Hello world!</a>
                                </li>
                                <li class="recentcomments">
                                    <span class="comment-author-link"><a href='http://example.org/' rel='external nofollow' class='url'>John Doe</a></span> on <a href="http://wp.local/?p=1170#comment-30">Edge Case: No Content</a>
                                </li>
                                <li class="recentcomments">
                                    <span class="comment-author-link"><a href='http://example.org/' rel='external nofollow' class='url'>Jane Doe</a></span> on <a href="http://wp.local/?p=1168#comment-29">Protected: Template: Password Protected (the password is &#8220;enter&#8221;)</a>
                                </li>
                            </ul>
                        </section>
			
                        
                        
                        
                    </aside><!-- .site-sidebar .widget-area -->