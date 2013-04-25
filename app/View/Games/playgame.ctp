<?php
if($game['User']['seo_username']!=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>'')); 
}
else{
  $profilepublic=$this->Html->url(array("controller" => "games","action" =>"profile",$game['User']['id']));
}
?>
                <!-- span content -->
                <div class="span9">
                    <!-- content -->
                    <div class="content">
                        
                        <!-- content-body -->
                        <div class="content-body" style="padding-top:15px;">

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

<!-- Game Unit -->
<h6><span class="label label-important"><?php echo $game['Game']['name'] ?></span> : <?php echo $game['Game']['description'] ?> </h6>
<div class="well well-large">

<div style="margin:0 auto; text-align: center; background-color:#fff; font-family:Verdana, Geneva, sans-serif; color:#000; font-size:14px;">

<!--<embed id="startGame" src="http://games.mochiads.com/c/g/fruit-ninja-kapow/fruit_indep.swf" menu="false" quality="high" width="900" height="600" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> -->

<?php echo $game['Game']['embed'] ?>

</div>


</div>
<!-- /Game Unit -->
<?php  echo $this->element('NewPanel/ratebar',array('profilepublic'=>$profilepublic)); ?>


<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  checkFavStat='<?php echo $this->Html->url(array('controller'=>'games','action'=>'favorite_check')); ?>';
  game_id='<?php echo $game['Game']['id']; ?>';
  </script>
  <!----=========================================---->



<div class="well well-small">
 
    <a class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Favorite
    </a> 
	
	 <a class="btn" id="unFav_button" style="display:none;" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Unfavorite
    </a> 


<a class="btn btn-info pull-right" id="gameshare" data-toggle="popover" data-placement="left" data-html="true" data-content='


<?php echo  $this->element("NewPanel/share"); ?>

' title="Share on Socials" data-original-title="Social Share"><i class="icofont-share"></i> Share</a>

</div>

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

            <!--Comment box-->
            <div class="navbar">
              <div class="navbar-inner">
                </br>
                <form class="navbar-form ">
                    <textarea class="span12" rows="4"  placeholder="What do you think about this game?"></textarea>
                 </br>
                  <button type="submit" class="btn btn-info pull-left">Comment</button>
                </form></br>
              </div>
            </div>

<!-- Comment Unit -->

<div class="row-fluid">
                                <!-- tab resume update -->
                                <div class="span12">
                                    <div class="box-tab corner-all">
                                        <div class="box-header corner-top">
                                            <!--tab action-->
                                            <div class="header-control pull-right">
                                                <a data-box="collapse"><i class="icofont-caret-up"></i></a>
                                                <a data-box="close" data-hide="rotateOutDownLeft">×</a>
                                            </div>
                                            <ul class="nav nav-pills">
                                                <!--tab menus-->
                                                <li class="active"><a data-toggle="tab" href="#recent-orders">Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="box-body">
                                            <!-- widgets-tab-body -->
                                            <div class="tab-content">
             
                                                <div class="tab-pane fade in active" id="recent-orders">
                                                    
													<div id="game_comments_content"></div>
                                                    <?php echo $this->element('NewPanel/load_game_comments',array('game_id'=>$game['Game']['id']));?>
						
					
                                                </div>
                                            </div><!--/widgets-tab-body-->
                                        </div><!--/box-body-->
                                    </div><!--/box-tab-->
                                </div><!-- tab resume update -->
                            </div>

<!-- /Comment Unit -->
<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

                        </div><!--/content-body -->
                    </div><!-- /content -->
                </div><!-- /span content -->



