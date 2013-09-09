<?php
$gamename = $game['Game']['name'];
$description = $game['Game']['description'];
$username = $game['User']['seo_username'];
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
                        <div class="content-body" style="background-color:#e5e5e5; padding-top:15px;">

<!-- Add Unit -->
<div class="well" style="padding:5px;">
<div align="center" style="max-height:110px; overflow:hidden;">

<?php echo $game['User']['adcode'] ?> 

</div>
</div>
<!-- /Add Unit -->

<!-- Game Unit -->
<h6><span class="btn-link label label-important"><a href="#">#<?php echo $gamename; ?></a></span> : <?php echo $description; ?> </h6>
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



<div class="well well-small">
 
    <a class="btn btn-danger" id="fav_button" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Favorite
    </a> 
	
	 <a class="btn" id="unFav_button" style="display:none;" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);">
     <i class="icofont-heart"></i> Unfavorite
    </a> 


<a class="btn btn-info" id="gameshare" data-toggle="popover" data-placement="right" data-html="true" data-content='


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


<div class="row-fluid">

<?php  echo $this->element('NewPanel/gamepagecomment',array('gamename'=>$gamename,'description'=>$description)); ?>


        <div style="padding:5px; background-color:white;" class="span5 shadow well">
                <h5 class="media-heading"><a style="margin-left:9px;" class="btn-link" href="#">#<?php echo $game['Game']['seo_url'];?> Feed</a></h5>
        </div>

        <div style="padding:10px; background-color:white;" class="span5 shadow well">
                <div>
                    <img class="media-object pull-left img-polaroid" width="30" src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg">
                </div>
                <h4 class="media-heading"><a style="margin-left:9px;" href="#">Miniclip - </a><a class="btn-mini btn-link"><i class="elusive-plus-sign"></i> Follow</a> <small class="pull-right helper-font-small"><a href="#" class="timeago" title="2 hours ago"></a>2 hours ago</small></h4>
                <p style="margin-left:50px;">A new clone has been made.</p>

        </div>
        <div style="padding:10px; background-color:white;" class="span5 shadow well">
                <div>
                    <img class="media-object pull-left img-polaroid" width="30" src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg">
                </div>
                <h4 class="media-heading"><a style="margin-left:9px;" href="#">Avengers - </a><a class="btn-mini btn-link"><i class="elusive-plus-sign"></i> Follow</a> <small class="pull-right helper-font-small"><a href="#" class="timeago" title="2 hours ago"></a>2 hours ago</small></h4>
                <p style="margin-left:50px;">Added to the favorite list.</p>

        </div>
          <div style="padding:10px; background-color:white;" class="span5 shadow well">
                <div>
                    <img class="media-object pull-left img-polaroid" width="30" src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg">
                </div>
                <h4 class="media-heading"><a style="margin-left:9px;" href="#">Socialesman - </a><a class="btn-mini btn-link"><i class="elusive-plus-sign"></i> Follow</a> <small class="pull-right helper-font-small"><a href="#" class="timeago" title="2 hours ago"></a>2 hours ago</small></h4>
                <p style="margin-left:50px;">Rated this game as 4 stars.</p>

        </div>
          <div style="padding:10px; background-color:white;" class="span5 shadow well">
                <div>
                    <img class="media-object pull-left img-polaroid" width="30" src="https://s3.amazonaws.com/betatoorkpics/upload/users/6/184532_292173477569836_806612665_n_1_original.jpg">
                </div>
                <h4 class="media-heading"><a style="margin-left:9px;" href="#">StarBucks - </a><a class="btn-mini btn-link"><i class="elusive-plus-sign"></i> Follow</a> <small class="pull-right helper-font-small"><a href="#" class="timeago" title="2 hours ago"></a>2 hours ago</small></h4>
                <p style="margin-left:50px;">Rated this game as 4 stars.</p>

        </div>



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



