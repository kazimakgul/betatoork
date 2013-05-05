<?php $image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',31)); ?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<div class="well well-small shadow-black" style=" padding-bottom:0px; 

background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);

background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  

background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  

">

<div class="row-fluid">
    <div class="span2">
        <div class="thumbnails">
         
            <a href="#">
                    <?php 
                    $avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
                echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('class'=>'img-polaroid','width'=>'90',"alt" => "toork avatar image")); 

                    ?>
            </a>
          
        </div>
        <h4 style="font-family: 'Merriweather Sans', sans-serif; font-size: 18px; color:white; text-shadow: 1px 1px black;"><?php echo $catName; ?></h4>
        <h5><i class="elusive-plus-sign color-blue"></i> 
            <?php echo $this->Paginator->counter(array( 'format' => __('{:count}')));?> Games </h5>
    </div>

    <div class="span10 pull-right " style="padding-top:170px;">
        <p style="background: rgba(255, 255, 255, 0.3);"><strong><?php echo $description_for_layout?></strong></p>
    </div>

</div>
</div>

<div class="navbar">
          <div class="navbar-inner">
            <div class="container" style="width: auto">
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="nav-collapse">
                <ul class="nav">
                <?php 
                $caturl1=$this->Html->url(array("controller" => "games","action" =>"categorygames2",1)); 
                $caturl2=$this->Html->url(array("controller" => "games","action" =>"categorygames2",2)); 
                $caturl3=$this->Html->url(array("controller" => "games","action" =>"categorygames2",3)); 
                $caturl4=$this->Html->url(array("controller" => "games","action" =>"categorygames2",4)); 
                $caturl5=$this->Html->url(array("controller" => "games","action" =>"categorygames2",5)); 
                $caturl6=$this->Html->url(array("controller" => "games","action" =>"categorygames2",6)); 
                $caturl7=$this->Html->url(array("controller" => "games","action" =>"categorygames2",7)); 
                $caturl8=$this->Html->url(array("controller" => "games","action" =>"categorygames2",8)); 
                $caturl9=$this->Html->url(array("controller" => "games","action" =>"categorygames2",9)); 
                $caturl10=$this->Html->url(array("controller" => "games","action" =>"categorygames2",10)); 
                $caturl11=$this->Html->url(array("controller" => "games","action" =>"categorygames2",11)); 
                $caturl12=$this->Html->url(array("controller" => "games","action" =>"categorygames2",12));
                $caturl13=$this->Html->url(array("controller" => "games","action" =>"categorygames2",13)); 
                $caturl14=$this->Html->url(array("controller" => "games","action" =>"categorygames2",14)); 
                $caturl15=$this->Html->url(array("controller" => "games","action" =>"categorygames2",15)); 
                $caturl16=$this->Html->url(array("controller" => "games","action" =>"categorygames2",16)); 
                $caturl17=$this->Html->url(array("controller" => "games","action" =>"categorygames2",17)); 
                ?>              
                  <li><a href="<?php echo $caturl1; ?>">Action</a></li>
                  <li><a href="<?php echo $caturl2; ?>">Adventure</a></li>
                  <li><a href="<?php echo $caturl3; ?>">Race</a></li>
                  <li><a href="<?php echo $caturl4; ?>">Shooting</a></li>
                  <li><a href="<?php echo $caturl5; ?>">Board</a></li>
                  <li><a href="<?php echo $caturl6; ?>">Multiplayer</a></li>
                  <li><a href="<?php echo $caturl7; ?>">Puzzle</a></li>
                  <li><a href="<?php echo $caturl8; ?>">Card</a></li>
                  <li><a href="<?php echo $caturl9; ?>">Social</a></li>
                  <li><a href="<?php echo $caturl10; ?>">3D</a></li>
                  <li><a href="<?php echo $caturl11; ?>">Kids</a></li>

                </ul>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $caturl12; ?>">Girls</a></li>
                            <li><a href="<?php echo $caturl13; ?>">Word</a></li>
                            <li><a href="<?php echo $caturl14; ?>">Role-playing</a></li>
                            <li><a href="<?php echo $caturl15; ?>">Fighting</a></li>
                            <li><a href="<?php echo $caturl16; ?>">MMORPG</a></li>
                            <li><a href="<?php echo $caturl17; ?>">Sports</a></li>
                        </ul>
                    </li>
                </ul>
              </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
          </div><!-- /navbar-inner -->
        </div>



                                <ul class="thumbnails">
                                    <?php  echo $this->element('NewPanel/gamebox/dashboard_game_box'); ?>
                                </ul>


                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->