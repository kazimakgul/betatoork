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
		$comment=tolink(htmlcode($cdata['comment'] ),Router::url('/', true));
		$time=$cdata['created'];
		$mtime=date("c", $time);
		$username=$cdata['username'];
		$channelurl=$this->Html->url(array("controller" => $cdata['seo_username'],"action" =>"")); 
		$com_uid=$cdata['uid_fk'];
		// User Avatar
		if($gravatar)
			{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$com_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'25','onerror'=>'imgError(this,"avatar");'));
			}
		else
		{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$com_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'25','onerror'=>'imgError(this,"avatar");'));
		}
// End Avatar
?>

<div style=" border-top-style:solid; border-right-style:none; border-left-style:none; border-bottom-style:none;  border-radius:0px; -moz-border-radius:0px; -webkit-border-radius:0px; margin-bottom:3px; margin-left:-20px; margin-right:-20px; padding:0px 5px 0px 5px;" class="well" id="stcommentbody<?php echo $com_id; ?>">
<?php if(isset($uid) && ($uid==$com_uid || $uid==$msg_uid) ){ ?>
<a class="stcommentdelete close" style="margin-right:5px;" href="#" id="<?php echo $com_id; ?>">  &times;</a>
<?php } ?>

	<div style="margin:5px 10px 0px 0px;" class="commentleft">
		<div >
			<?php echo $cface;?>
		</div>
	</div>


		<span class="commentusername"><a href="<?php echo $channelurl ?>"><?php echo $username; ?></a></span>
		<div style="margin-right:15px;" class="helper-font-9 stcommenttime pull-right" title="<?php echo $mtime; ?>"></div>
		<p ><small><?php echo $comment ?></small> - <small class="btn-link"><i class="elusive-thumbs-up"></i> Like</small></p>

</div>


<?php 
	}
}
?>