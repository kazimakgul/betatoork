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
      <div style="margin-right:15px;" class="helper-font-9 stcommenttime pull-right" title="<?php echo $mtime; ?>"></div>
      <p style="margin:0px 0px 0px 50px;"><small><?php echo $comment ?></small></p>
      <p style="margin:0px 0px 0px 50px; opacity:0.5;"><small class="btn-link"><i class="elusive-thumbs-up"></i> Like</small> - <small class="btn-link"><i class="elusive-asl"></i> Agree</small> - <small class="btn-link"><i class="elusive-thumbs-down"></i> Disagree</small></p>

</div>