<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php 

if(!isset($lastid) || $lastid=='')
$lastid=0;

if(isset($profile_uid))
{
	$updatesarray=$Wall->Updates($profile_uid,$lastid);
	$total=$Wall->Total_Updates($profile_uid);
}
else
{
	$updatesarray=$Wall->Friends_Updates($uid,$lastid);
	$total=$Wall->Total_Friends_Updates($uid);
}
if($gravatar)
$session_face=$Wall->Gravatar($uid);
else
$session_face=$Wall->Profile_Pic($uid);


if($updatesarray)
{
	foreach($updatesarray as $data)
	{
		$msg_id=$data['msg_id'];
		$orimessage=$data['message'];
		$message=tolink(htmlcode($data['message']),Router::url('/', true));
		$time=$data['created'];
		$mtime=date("c", $time);
		$username=$data['username'];
		$uploads=$data['uploads'];
		$msg_uid=$data['uid_fk'];
		// User Avatar
		if($gravatar)
			$face=$Wall->Gravatar($msg_uid);
		else
			$face=$Wall->Profile_Pic($msg_uid);
		// End Avatar
?>
<div class="stbody111" id="stbody<?php echo $msg_id;?>">
	<div class="stimg">
		<img src="<?php echo $face;?>" class='big_face' alt='<?php echo $username; ?>'/>
	</div> 
	<div class="sttext">
	<?php if($uid==$msg_uid) { ?>
		<a class="stdelete" href="#" id="<?php echo $msg_id;?>" title="Delete Update"></a>
	<?php } ?>
		<b><a href="<?php echo $base_url.$username; ?>"><?php echo $username;?></a></b> 
		<?php echo clear($message);  ?> 
		<?php
		 if($uploads)
		{
			echo "<div style='margin-top:10px'>";
			$s = explode(",", $uploads);
			foreach($s as $a)
			{
				$newdata=$Wall->Get_Upload_Image_Id($a);
				if($newdata)
					echo "<a href='wall/".$newdata['image_path']."' rel='facebox'><img src='wall/".$newdata['image_path']."' class='imgpreview' /></a>";
			}
			echo "</div>";
		}
		?>
		<div class="sttime">
			<a href='#' class='commentopen' id='<?php echo $msg_id;?>' title='Comment'>Comment </a> 
			| 
			<a href='<?php echo $base_url ?>status/<?php echo $msg_id; ?>' class="timeago" title='<?php echo $mtime; ?>'></a>
		</div> 
		<div id="stexpandbox">
			<div id="stexpand<?php echo $msg_id;?>">
				<?php
				if(textlink($orimessage))
				{
					$link =textlink($orimessage);
					echo Expand_URL($link);
				}?>	
			</div>
		</div>
<div class="commentcontainer" id="commentload<?php echo $msg_id;?>">
<?php
$x=1;
echo $this->element('wall/load_comments',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); ?>
</div>
	<div class="commentupdate" style='display:none' id='commentbox<?php echo $msg_id;?>'>
		<div class="stcommentimg">
			<img src="<?php echo $session_face;?>" class='small_face'/>
		</div> 
		<div class="stcommenttext" >
			<form method="post" action="">
				<textarea name="comment" class="comment" maxlength="200"  id="ctextarea<?php echo $msg_id;?>"></textarea>
				<br />
				<input type="submit"  value=" Comment "  id="<?php echo $msg_id;?>" class="comment_button button"/>
			</form>
		</div>
	</div>
</div> 
</div>
<?php
  }

  if($total>$perpage)
  {
  ?>
 <!-- More Button here $msg_id values is a last message id value. -->
<div id="more<?php echo $msg_id; ?>" class="morebox">
<a href="#" class="more" id="<?php echo $msg_id; ?>">More</a>
</div>

  <?php
  }
  }
else
echo '<h3 id="noupdates">No Updates</h3>';
?>