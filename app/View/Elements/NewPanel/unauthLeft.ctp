 
<?php
$router = Router::url();

if ($this->action == "dashboard"){
    $class = "class='active first'";
}elseif($this->action == "mygames"){
    $class2 = "class='active'";
}
 ?>




 <div class="span1">
                    <!--side bar-->
                    <aside class="side-left" >
                        <ul class="sidebar">
                            <li <?php echo $class;?>> <!--always define class .first for first-child of li element sidebar left-->
                                <a href="<?php echo $index; ?>" title="what is toork">
                                    <div class="helper-font-24">
                                        <i class="icofont-link"></i>
                                    </div>
                                    <span class="sidebar-text">Join Toork</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="more">
                                    <div class="badge badge-important">3</div>
                                    <div class="helper-font-24">
                                        <i class="elusive-compass"></i>
                                    </div>
                                    <span class="sidebar-text">Discover</span>
                                </a>
                                <ul class="sub-sidebar corner-top shadow-silver-dark">
                                    <li style="margin:0px 10px 0px 10px;">
                                        <a href="<?php echo $bestchannels; ?>" title="Best Channels">
                                            <div class="helper-font-24">
                                                <i class="icofont-link"></i>
                                            </div>
                                            <span class="sidebar-text">Best Channels</span>
                                        </a>
                                    </li>
                                    <li style="margin:0px 10px 0px 10px;">
                                        <a href="<?php echo $toprated; ?>" title="Hot Games">
                                            <div class="helper-font-24">
                                                <i class="elusive-fire"></i>
                                            </div>
                                            <span class="sidebar-text">Hot Games</span>
                                        </a>
                                    </li>
                                    <li style="margin:0px 10px 0px 10px;">
                                        <a href="#" title="New Games">
                                            <div class="helper-font-24">
                                                <i class="elusive-eye-open"></i>
                                            </div>
                                            <span class="sidebar-text">New Games</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->