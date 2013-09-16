<?php
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
$explore=$this->Html->url(array("controller" => "games","action" =>"explore"));
$currentlink=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">
                            <!-- content-breadcrumb -->
                        <div style="background-color:white;" class=" shadow well well-small">
                            <a href="<?php echo $explore; ?>"><i class="elusive-compass"></i> Explore</a><span class="divider"> › </span>
                            <a href="#"><i class="elusive-heart color-orange"></i> Recommended Channels</a>

                            <ul class="breadcrumb-nav pull-right">
                                
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $currentlink;?>/sort:Userstat.potential/direction:desc">Recommend</a></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:id/direction:desc">New Channels</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $currentlink;?>/sort:Userstat.subscribeto/direction:desc">Followers</a></li>
                                    </ul>
                                </li>

                            </ul><!--/breadcrumb-nav-->

                        </div><!-- content-breadcrumb -->

<?php
if($this->Session->check('Auth.User')){
?>

<div class="raw-fluid">
<div style="background-color:white;" class=" shadow well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5>Follow Channels</h5>
  <p>Following a channel means that you like the channel and you want to be more connected to the channel and games they have. You don't have to go to any other game site to see anything new anymore.</p>
</div>

<div style="background-color:white;" class="shadow alert alert-info span7">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5><i class="elusive-info-sign"></i> Tips and Tricks</h5>
  <p><i class="elusive-ok-sign"></i> Follow the channels you are interested about</p>
  <p><i class="elusive-ok-sign"></i> Your dashboard will be full of your interests.</p>
  <p><i class="elusive-ok-sign"></i> Channels will let you know first about the news they have.</p>
  <p><i class="elusive-ok-sign"></i> One game source to rule them all!</p>

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
<?php  echo $this->element('NewPanel/bestchannel_box'); ?>
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