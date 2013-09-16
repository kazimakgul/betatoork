<?php 
$bestchannels=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));
$topgames=$this->Html->url(array("controller" => "games","action" =>"toprated2"));
$newgames=$this->Html->url(array( "controller" => "games","action" =>"toprated2"));$newgames.='/sort:id/direction:desc';
$featuredchannels=$this->Html->url(array("controller" => "games","action" =>"featuredchannels"));
$categorygames=$this->Html->url(array("controller" => "games","action" =>"categorygames2",1));

$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
$addGame=$this->Html->url(array("controller" => "games","action" =>"add2"));
$settings=$this->Html->url(array("controller" => "users","action" =>"settings",$this->Session->read('Auth.User.id')));
$wall=$this->Html->url(array("controller" => "wallentries","action" =>"wall3"));
$profilepublic=$this->Html->url(array( "controller" => h($user['User']['seo_username']),"action" =>''));
$username = $user['User']['seo_username'];
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        
                        
                        <!-- content-body -->
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">
                            <!-- dashboard -->
    <?php if($isActive==0){ ?>
    <div class="alert alert-warning span12">
                                    <div class="box-header corner-top">
                                            <div class="header-control">
                                            <button data-box="close" data-hide="fadeOut" class="close">×</button>
                                            </div>
                                            
                                    </div>
        <p> <i class="elusive-mail-alt helper-font-24"></i> Your account is not active yet. Please check your email to activate your account to be able to publish your own games. ( Don't forget to check your spam folder also. )</p>
    </div>
<?php }else{}?>
<!--<i class="elusive-graph"></i> Your analytics are not active yet! You will be able to earn money via your channel soon.
<div class="row-fluid" style="opacity:0.3;">
    <div class="alert alert-info span3">
        <i class="elusive-thumbs-up helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">124</h2>
            <h4>Followers</h4>
        </div>
    </div>
    <div class="alert alert-info span3">
        <i class="elusive-group helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">1902</h2>
            <h4>Visitors</h4>
        </div>
    </div>
    <div class="alert alert-info span3">
        <i class="elusive-heart-alt helper-font-48"></i>
        <div class="pull-right ">
            <h2 style="margin:-8px 0px 0px 0px;">41</h2>
            <h4>Favorites</h4>
        </div>
    </div>
    <div class="alert alert-danger span3" style="padding:5px;">
        <h4>Your Channel Worth</h4>
        <div>
            <h2 style="margin:-3px 0px 0px 0px;">$7.15 <a rel="tooltip" data-placement="bottom" data-original-title="Not Active Yet"  class="btn btn-danger">Sell Now!</a> </h2>
        </div>
    </div>
</div> -->

<?php echo $this->element('NewPanel/explore/explorefeed');?>
                             
                                <ul class="thumbnails" id="thumbnails_area">
                                    
                                    <div class="well span6 well-small shadow-black" style=" margin-left:10px; padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/44.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/44.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/44.jpg); /* FF 3.6+ */">
                                        
                                        <a href="<?php echo $featuredchannels; ?>" class="btn btn-large btn-danger" style="margin-bottom:10px; margin-top:100px;">
                                          <i class="elusive-star-alt color-gold"></i> Featured Channels
                                        </a> 
                                        </div>

                                    <div class="well span6 well-small shadow-black" style=" margin-left:10px; padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/5.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/5.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/5.jpg); /* FF 3.6+ */">
                                        
                                        <a href="<?php echo $bestchannels; ?>" class="btn btn-large btn-warning" style="margin-bottom:10px; margin-top:100px;">
                                          <i class="elusive-heart color-orange"></i> Recommended Channels
                                        </a> 
                                        </div>
                                     <div class="well span6 well-small shadow-black" style=" margin-left:10px; padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/59.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/59.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/59.jpg); /* FF 3.6+ */">
                                        
                                        <a href="<?php echo $topgames; ?>" class="btn btn-large btn-success" style="margin-bottom:10px; margin-top:100px;">
                                          <i class="elusive-fire color-red"></i> Hot Games
                                        </a> 
                                        </div>
                                    <div class="well span6 well-small shadow-black" style=" margin-left:10px; padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/52.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/52.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/52.jpg); /* FF 3.6+ */">
                                        
                                        <a href="<?php echo $newgames; ?>" class="btn btn-large btn-info" style="margin-bottom:10px; margin-top:100px;">
                                          <i class="elusive-eye-open color-purple"></i> New Games
                                        </a> 
                                        </div>
                                    <div class="well span6 well-small shadow-black" style=" margin-left:10px; padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/57.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/57.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/57.jpg); /* FF 3.6+ */">
                                        
                                        <a href="<?php echo $categorygames; ?>" class="btn btn-large btn-inverse" style="margin-bottom:10px; margin-top:100px;">
                                          <i class="elusive-flag color-blue"></i> Categories
                                        </a> 
                                        </div>


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
                            <!--/dashboard-->
                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->