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
		<a href="#" class="view_comments2" id="<?php echo $msg_id; ?>" vi='<?php echo $comment_count; ?>'>View all <?php echo $comment_count; ?> comments</a>
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
		$comment=tolink(htmlcode($cdata['comment']),Router::url('/', true));
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
<div class="clearfix alert alert-info" id="stcommentbody2<?php echo $com_id; ?>">
<?php if(isset($uid) && ($uid==$com_uid || $uid==$msg_uid) ){ ?>
<a class="stcommentdelete2 close" href="#" id="<?php echo $com_id; ?>">&times;</a>
<?php } ?>
	<div class="commentleft">
		<div class="commentavatarback">
			<?php echo $cface;?>
		</div>
	</div>

		<span class="commentusername"><a href="<?php echo $channelurl ?>"><?php echo $username; ?></a></span>
		<p><small><?php echo $comment ?></small></p>
		<small class="helper-font-small"><div class="stcommenttime pull-right" title="<?php echo $mtime; ?>"></div></small>

</div>
<?php 
	}
}
?>