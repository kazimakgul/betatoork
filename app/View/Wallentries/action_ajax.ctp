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


<div class="feed_status">
	<div class="upfeed"></div>
	<div class="midfeed clearfix">
		<div class="feedcontentleft">
			<div class="feedavatarback">
				<?php echo $face;?>
			</div>
		</div>
		<div class="feedcontentright">
			<span class="feedcontentusername"><a href="<?php echo $channelurl; ?>"><?php echo $username?></a></span>
			<span class="feedcontenttitle"><?php echo $message?></span>
			<div class="sttime">
				<a href='#' class='commentopen' id='<?php echo $msg_id;?>' title='Comment'>Comment </a> | 
				<a href='<?php echo $base_url ?>status/<?php echo $msg_id; ?>' class="timeago" title='<?php echo $mtime; ?>'></a>
			</div> 
			<div class="commentcontainer" id="commentload<?php echo $msg_id;?>">
			<?php //Bu satiri sildim--->echo $this->element('wall/load_comments',array('msg_id'=>$msg_id)); ?>
			</div>			
			<div class="commentupdate feedcommentarea clearfix" style='display:none' id='commentbox<?php echo $msg_id;?>'>
				<div class="commentleft">
					<div class="commentavatarback">
						<?php echo $face;?>
					</div>
				</div>
				<div class="commentright">
					<textarea name="comment" class="commentarea" maxlength="200" cols="53" rows="2" id="ctextarea<?php echo $msg_id;?>"></textarea>
					<input type="submit"  value=""  id="<?php echo $msg_id;?>" class="comment_button commentbtn"/>
				</div>
			</div>		
		</div>
	</div>
	<div class="botfeed"></div>
</div>