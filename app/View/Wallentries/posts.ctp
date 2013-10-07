<?php $bestchannel=$this->Html->url(array("controller" => "games","action" =>"bestchannels2"));?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">

                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">
   
<?php  
$channelimage=$this->Upload->image($channeldata,'User.picture',array(),array('class'=>'img-polaroid', 'width'=>'70px','onerror'=>'imgError(this,"avatar");'));
$image = $this->requestAction( array('controller' => 'users', 'action' => 'randomPicture',62));
$channelurl=$this->Html->url(array("controller"=> h($channeldata['User']['seo_username'])));
$publicuser=$user;
$userid=$user['User']['id'];
?>
<?php if($user['User']['banner']==null) { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(http://s3.amazonaws.com/betatoorkpics/banners/<?php echo $image; ?>.jpg); /* FF 3.6+ */  
">
<?php } else { ?>
<div class="well well-small shadow-black" style=" padding-bottom:0px;background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>);background: -webkit-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* Safari 4+, Chrome 2+ */  background: -moz-linear-gradient(top, rgba(255,255,255,0) 50%, rgba(255,255,255,1) 100%), url(<?php echo Configure::read('S3.url')."/upload/users/".$userid."/".$publicuser['User']['banner'];?>); /* FF 3.6+ */  
">
<?php } ?>
<div class="row-fluid" style="margin-bottom:10px;" >
    <div class="span2">    
        <div class="thumbnails">
            <a href="<?php echo $channelurl; ?>">
            <?php echo $channelimage; ?>
            </a>
          
        </div>

    </div>

</div>

</div>
                            <div class="row-fluid">

                                <div class="offset2 span7">
                                    <div>

                                        <div class="box-body" style="margin:-20px 0px 0px 0px;">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="new-feeds">


										<div id="content"></div>			
												
					                       <?php echo $this->element('NewPanel/load_single_mess');?>
						
                                                </div>
                                                            
						
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->

                            </div><!-- tab stat -->
                            
                            
                            <!--/dashboar-->
                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->