<?php 
$channelurl=$this->Html->url(array("controller" => $seo_username,"action" =>"")); 
// User Avatar
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
// End Avatar
?>


<div class="clearfix alert alert-info" id="stcommentbody<?php echo $com_id; ?>">
<a class="stcommentdelete close" href="#" id="<?php echo $com_id; ?>">&times;</a>
	<div class="commentleft">
		<div class="commentavatarback">
			<?php echo $cface;?>
		</div>
	</div>

	<a class="stcommentdelete" href="#" id='<?php echo $com_id; ?>'></a>
		<span class="commentusername"><a href="<?php echo $channelurl ?>"><?php echo $username; ?></a></span>
		<p><small><?php echo $comment ?></small></p>
		<small class="helper-font-small"><div class="stcommenttime pull-right" title="<?php echo $mtime; ?>"></div></small>

</div>