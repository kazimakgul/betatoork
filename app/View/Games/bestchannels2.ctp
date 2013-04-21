<?php
$index=$this->Html->url(array("controller" => "games","action" =>"index"));
?>

                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
 
                        <!-- content-breadcrumb -->
                        <div class="content-breadcrumb">
                            <!--breadcrumb-nav-->
                            <ul class="breadcrumb-nav pull-right">
                                <li class="divider"></li>
                                <li class="btn-group">
                                    <a href="#" class="btn btn-small btn-link dropdown-toggle" data-toggle="dropdown">
                                        <i class="icofont-tasks"></i> Sort
                                        <i class="icofont-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Recommend</a></li>
                                        <li><a href="#">New Channels</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Chained</a></li>
                                    </ul>
                                </li>

                            </ul><!--/breadcrumb-nav-->
                            
                            <!--breadcrumb-->
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="icofont-link"></i> Best Channels</a></li>
                            </ul><!--/breadcrumb-->
                        </div><!-- /content-breadcrumb -->
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">



<?php
if($this->Session->check('Auth.User')){
?>

<div class="raw-fluid span12">
<div class="well well-small span5">
    <div class="box-header corner-top">
        <div class="header-control">
        <button data-box="close" data-hide="fadeOut" class="close">&times;</button>
        </div>
        
    </div>
  <h5>Follow Channels</h5>
  <p>Following a channel means that you like the channel and you want to be more connected to the channel and games they have. You don't have to go to any other game site to see anything new anymore.</p>
</div>

<div class="alert alert-info span7">
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

<ul class="thumbnails">

<?php  echo $this->element('NewPanel/bestchannel_box'); ?>

</ul>



                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->