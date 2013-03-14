        <!-- section header -->
        <header class="header">
            <!--nav bar helper-->
            <div class="navbar-helper">
                <div class="row-fluid">
                    <!--panel site-name-->
                    <div class="span2">
                        <div class="panel-sitename">
                            <h2><a href="<?php echo $index; ?>">T<span size="small" class="color-blue">oo</span>rk</a></h2>
                        </div>
                    </div>
                    <!--/panel name-->

                    <div class="span6">
                        <!--panel search-->
                        <div class="panel-search">
                            <form class="form-search">
                                <div class="input-icon-append">
                                    <button type="submit" rel="tooltip-bottom" title="search" class="icon"><i class="icofont-search"></i></button>
                                    <input class="input-large search-query grd-white" maxlength="23" placeholder="Search here..." type="text">
                                </div>
                            </form>
                        </div><!--/panel search-->
                    </div>
                    <div class="span4">
                        <!--panel button ext-->
                        <div class="panel-ext">

                            <div class="btn-group">
                                <a class="btn btn-small btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
                                   <i class="elusive-compass"></i> Explore <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a tabindex="-1" href="#">Featured Games</a></li>
                                    <li><a tabindex="-1" href="#">Best Channels</a></li>
                                    <li><a tabindex="-1" href="#">New Games</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Games</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="pricing.html">Top Rated</a></li>
                                            <li><a tabindex="-1" href="bonus-page/resume/index.html">Most Played</a></li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Support and Docs</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="403.html">About Us</a></li>
                                            <li><a tabindex="-1" href="404.html">Support</a></li>
                                            <li><a tabindex="-1" href="503.html">Developers</a></li>
                                            <li><a tabindex="-1" href="under-construction.html">Advertise With Us</a></li>
                                            <li><a tabindex="-1" href="405.html">Terms</a></li>
                                            <li><a tabindex="-1" href="500.html">Privacy</a></li>
                                        </ul>
                                    </li>
                                    <li><a tabindex="-1" href="#">FAQs and Descussions</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a tabindex="-1" href="#">Quick Links</a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="403.html">Dashboard</a></li>
                                            <li><a tabindex="-1" href="403.html">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-small btn-success" href="<?php echo $login; ?>"><i class="icofont-user"></i> Sign up for free</a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-small btn-inverse" href="<?php echo $login; ?>"><i class="icofont-lock"></i> Sign In</a>
                            </div>
                        </div><!--panel button ext-->
                    </div>
                </div>
            </div><!--/nav bar helper-->
        </header>