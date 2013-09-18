<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php 
$commentsarray=$Wall->Comments($msg_id,0);

if($x)
{
	$comment_count=count($commentsarray);
	$second_count=$comment_count-4;
	if($comment_count>4)
	{
?>
	<div class="comment_ui" id="view<?php echo $msg_id; ?>">
		<a href="#" class="helper-font-9 bold view_comments" id="<?php echo $msg_id; ?>" vi='<?php echo $comment_count; ?>'>View All <?php echo $comment_count; ?> comments</a>
	</div>
<?php
		$commentsarray=$Wall->Comments($msg_id,$second_count);
	}
}
if($commentsarray)
{
	foreach($commentsarray as $cdata)
	{
		$com_id=$cdata['com_id'];
		$comment=tolink(htmlcode($cdata['comment'] ));
		$time=$cdata['created'];
		$mtime=date("c", $time);
		$username=$cdata['username'];
		$channelurl=$this->Html->url(array("controller" => $cdata['seo_username'],"action" =>"")); 
		$com_uid=$cdata['uid_fk'];
		// User Avatar
		if($gravatar)
			{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$com_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
			}
		else
		{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$com_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
		}
// End Avatar
?>

<div style="border-radius:0px; -moz-border-radius:0px; -webkit-border-radius:0px; margin-bottom:3px; margin-left:-20px; margin-right:-20px; padding:0px 5px 0px 5px;" class="well" id="stcommentbody<?php echo $com_id; ?>">
<?php if(isset($uid) && ($uid==$com_uid || $uid==$msg_uid) ){ ?>
<a class="stcommentdelete close" style="margin-right:5px;" href="#" id="<?php echo $com_id; ?>">  &times;</a>
<?php } ?>

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


<?php 
	}
}
?>