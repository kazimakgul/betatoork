<?php
$gamename = $game['Game']['name'];
$description = $game['Game']['description'];
$username = $game['User']['seo_username'];
$hashtaglink=$this->Html->url(array("controller" => "games","action" =>"hashtag",$game['Game']['seo_url']));
if($username !=NULL)
{
  $profilepublic=$this->Html->url(array( "controller" => h($username ),"action" =>'')); 
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
<div style="padding:5px; background-color:white;" class="shadow well">
<h6 class="media-heading" style="margin-left:9px;" ><span class="btn-link label label-important"><a href="<?php echo $hashtaglink; ?>">#<?php echo $gamename; ?></a></span> : <?php echo $description; ?> </h6>
</div>
<div class="well" style="padding:5px;">

<div style="margin:0 auto; text-align: center; font-family:Verdana, Geneva, sans-serif; color:#000; font-size:5px;">

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



<div style="padding:5px; background-color:white;" class="shadow well">

                   <li rel="tooltip" data-placement="top" data-original-title="Clone This Game" href="#myModalclone" data-toggle="modal" class="btn btn-success">
                      <a><i class="elusive-map-marker"></i><i class="elusive-resize-horizontal"></i><i class="elusive-tint"></i> Clone</a>
                  </li>
 
    <a class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Favorite
    </a> 
	
	 <a class="btn" id="unFav_button" style="display:none;" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Unfavorite
    </a> 

<div class="pull-right">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52f773524f71b7c3"></script>
<!-- AddThis Button END -->
</div>

</div>

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->


<div class="row-fluid">

<?php  echo $this->element('NewPanel/gamepagecomment',array('gamename'=>$gamename,'description'=>$description)); ?>


        <div style="padding:5px; background-color:white;" class="span5 shadow well">
                <h5 class="media-heading"><a style="margin-left:9px;" class="btn-link" href="<?php echo $hashtaglink; ?>">#<?php echo $game['Game']['seo_url'];?> Feed</a></h5>
        </div>

<?php if($tagActivities!=NULL) { ?>
<?php echo $this->element('NewPanel/load_game_activity');?>
<?php }else{ ?>

        <div style="background-color:white;" class="span5 shadow well">
                <h5 class="media-heading color-purple">Be the first to make an activity for this game</h5>
                <h6 class="media-heading"><i class="elusive-download-alt"></i> Use the rate bar down here</h6>
                <h4 class="media-heading color-red"><i class="elusive-heart"></i> Add this game to your favorites</h4>
                <h3 class="media-heading color-blue"><i class="elusive-tint"></i> Make a Clone!</h3>
                <h5 class="media-heading color-gold"><i class="elusive-star"></i> Rate this game please!</h5>
                <h4 class="media-heading color-green"><i class="elusive-comment"></i> Comment about the game!</h5>
                <h6 class="media-heading">Your activity will be published here</h6>
        </div>

<?php } ?>

</div>


<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

<!-- /Recommended Games -->
<div style="padding:5px; background-color:white;" class="shadow well">

<h5 class="media-heading" style="margin-left:9px;" >Recommended games by <span class="btn-link label label-important"><a href="<?php echo $profilepublic; ?>"> @<?php echo $username; ?></a></span></h5>

</div>

<ul class="thumbnails" id="thumbnails_area">
<?php  echo $this->element('NewPanel/profile/channel_game_box'); ?>
</ul>

<!-- /Recommended Games -->

                        </div><!--/content-body -->
<?php  echo $this->element('NewPanel/dashfooter'); ?>
                    </div><!-- /content -->
                </div><!-- /span content -->



