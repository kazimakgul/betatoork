 
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
                            <li <?php echo $class2;?>>
                                <a href="#" title="explore">
                                    <div class="helper-font-24">
                                        <i class="elusive-compass"></i>
                                    </div>
                                    <span class="sidebar-text">Explore</span>
                                </a>
                            </li>
                        </ul>
                    </aside><!--/side bar -->
                </div><!-- span side-left -->