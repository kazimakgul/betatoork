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


<div style="border-radius:0px; -moz-border-radius:0px; -webkit-border-radius:0px; margin-bottom:3px; margin-left:-20px; margin-right:-20px; padding:0px;" class="well" id="stcommentbody<?php echo $com_id; ?>">
<a class="stcommentdelete close" style="margin-right:5px;" href="#" id="<?php echo $com_id; ?>">  &times;</a>
	<div class="commentleft">
		<div class="commentavatarback">
			<?php echo $cface;?>
		</div>
	</div>

      <span class="commentusername"><a href="<?php echo $channelurl ?>"><?php echo $username; ?></a></span>
      <small class="helper-font-9"><div style="margin-right:10px;" class="stcommenttime pull-right" title="<?php echo $mtime; ?>"></div></small>
      <p><small><?php echo $comment ?></small></p>

</div>