<?php if(isset($data)) { ?>

<div class="stbody" id="stbody<?php echo $msg_id;?>">
<div class="stimg">
<img src="<?php echo $face;?>" class='big_face' alt='<?php echo $username; ?>'/>
</div> 
<div class="sttext">
	<a class="stdelete" href="#" id="<?php echo $msg_id;?>" title='Delete Update'></a>
	<b><a href="<?php echo $base_url.$username; ?>"><?php echo $username;?></a></b> <?php echo clear($message);?>
	<?php
	 if($uploads)
	{
		echo "<div style='margin-top:10px'>";
		$uploads_array=explode(',',$uploads);
		$uploads=implode(',',array_unique($uploads_array));
		$s = explode(",", $uploads);
		foreach($s as $a)
		{
			$newdata=$Wall->Get_Upload_Image_Id($a);
			if($newdata)
				echo "<img src='wall/".$newdata['image_path']."' class='imgpreview'/>";
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
		<div id="stexpand">
			<?
			if(textlink($orimessage))
			{
				$link =textlink($orimessage);
				echo Expand_URL($link);
			}
			?>
		</div>
	</div>
		<div class="commentcontainer" id="commentload<?php echo $msg_id;?>">
		<?php //Bu satiri sildim--->echo $this->element('wall/load_comments',array('msg_id'=>$msg_id)); ?>
		</div>
		<div class="commentupdate" style='display:none' id='commentbox<?php echo $msg_id;?>'>
			<div class="stcommentimg">
				<img src="<?php echo $face;?>" class='small_face'/>
			</div> 
			<div class="stcommenttext" >
				<form method="post" action="">
					<textarea name="comment" class="comment" maxlength="200" id="ctextarea<?php echo $msg_id;?>"></textarea>
					<br />
					<input type="submit"  value=" Comment "  id="<?php echo $msg_id;?>" class="comment_button button"/>
				</form>
			</div>
		</div>
	</div> 
</div>

<?php } ?>