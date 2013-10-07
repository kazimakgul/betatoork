<?php 
$addgame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
$explore=$this->Html->url(array("controller" => "games","action" =>"explore"));
$currentlink=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

                            <!-- content-breadcrumb -->
                        <div style="background-color:white;" class=" shadow well well-small">
                            <a href="<?php echo $explore; ?>"><i class="elusive-compass"></i> Explore</a><span class="divider"> › </span>
                            <a href="#"><i class="elusive-fire color-red"></i> Hot Games</a>

                            <ul class="breadcrumb-nav pull-right">
                                
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $currentlink;?>/sort:recommend/direction:desc">Recommended</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:starsize/direction:desc">Top Rated</a></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:playcount/direction:desc">Most Played</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:id/direction:desc">New Games</a></li>
                                    </ul>
                                </li>

                            </ul><!--/breadcrumb-nav-->

                        </div><!-- content-breadcrumb -->


<?php
if($this->Session->check('Auth.User')){
?>

<div class="raw-fluid span12" style="margin-left:0px;">
<div style="background-color:white;" class="shadow well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4>Add a game to your account</h4>
  <p>Adding a game to your account is as simple as doing copy/paste. Just find a web page where you play a game. That's all.</p>
  <p>
    <a href="<?php echo $addgame; ?>" class="btn btn-danger">
      <i class="elusive-plus-sign"></i> Add Game
    </a>
  </p>
</div>

<div style="background-color:white;" class="shadow alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h4 style="margin:0px 0px 10px 0px;"><i class="elusive-info-sign"></i> Tips and Tricks</h4>
  <p><i class="elusive-ok-sign"></i> You can edit the games after you add them.</p>
  <p><i class="elusive-ok-sign"></i> Change the picture of the game if it doesnt fit your needs.</p>
  <p><i class="elusive-ok-sign"></i> You can also change the name and description of the game.</p>
  <p><i class="elusive-ok-sign"></i> Finally, share games with your social networks, to reach more people.</p>

</div>
</div>

<?php
}else{
?>


            <div class="alert alert-info">
                <div class="box-header corner-top">
                <div class="header-control">
                <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
                </div>
                
            </div>
              <h4>Join Toork For Free</h4>
              <p>If you join Toork, you will be able to create your own game channel and let people play games you share on your channel. See the benefits below.</p>
                <ul>
                    <li>Create your own game channel</li>
                    <li>Your special dashboard that knows what you want</li>
                    <li>Collect the games you love</li>
                    <li>Add new games</li>
                    <li>Follow other channels</li>
                    <li>All you need for online games</li>
                </ul>
              <p>
                <a href="<?php echo $index ?>" class="btn btn-danger">
                  <i class="elusive-user"></i> Join Toork
                </a>
              </p>
            </div>


<?php
}
?>

<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/gamebox/toprated_box'); ?>
</ul>

<div style="margin-bottom:30px;">
    <a id="loadmoregame" class="offset3 span6 btn btn-block" style="border-radius:0px; opacity:0.7;"><i class="elusive-refresh"></i> Load More</a>
	<!--Hidden Pagination -->
	<div class="paging" style="display:none;">
     <?php 
	 echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled')); 
     echo $this->Paginator->numbers();
     echo $this->Paginator->next(__('next', true).' >>', array('id'=>'next'), null, array('class' => 'disabled'));
	 ?>
    </div>
    <!--Hidden Pagination -->
</div>  



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->