<?php 
$channelurl=$this->Html->url(array("controller" => $seo_username,"action" =>"")); 
// User Avatar
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
// End Avatar
?>

<div class="feed_game">
	<div class="upfeed"></div>
	<div class="midfeed clearfix">
		<div class="feedcontentleft">
			<div class="feedavatarback">
				<?php echo $face;?>
			</div>
		</div>
		<div class="feedcontentright">
			<span class="feedcontentusername"><a href="<?php echo $channelurl; ?>"><?php echo $username?></span>
			<span class="feedcontenttitle"><?php echo $status?></span>
			<div class="sttime">
				<a href='#' class='commentopen' id='<?php echo $msg_id;?>' title='Comment'>Comment </a>
				<a href='<?php echo $base_url ?>status/<?php echo $msg_id; ?>' class="timeago" title='<?php echo $mtime; ?>'></a>			
				<span class="feedcommentsep">|</span>
				<span class="feedplaybtn"><a href="#">Play</a></span>
				<span class="feedcommentsep">|</span>
				<span class="feedtime">5 minutes ago</span>
			</div> 
			<div class="feedcontent clearfix">
				<div class="feedgameavatar">
					<img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_gameavatar_default.png" />
				</div>   
				<div class="feedgamedesc">
					<span class="feedgamedesctitle">Game Desc</span>
					<span class="feedgamedescdesc"><?php echo $gamedesc?></span>
				</div>                                     
			</div>
			<div class="feedcomments">
				<div class="feedcommentarea clearfix">
					<div class="commentleft">
						<div class="commentavatarback">
							<?php echo $face;?>
						</div>
					</div>
					<div class="commentright">
						<textarea class="commentarea" cols="53" rows="2"></textarea>
						<div type="submit"  value=""  id="<?php echo $msg_id;?>" class="comment_button commentbtn">Comment</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="botfeed"></div>
</div>