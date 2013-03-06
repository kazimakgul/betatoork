<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php 

if(!isset($lastid) || $lastid=='')
$lastid=0;

if(!isset($type))
$type=NULL;

if(isset($profile_uid))
{
	$updatesarray=$Wall->Updates($profile_uid,$lastid,$type);
	$total=$Wall->Total_Updates($profile_uid);
}
else
{
	$updatesarray=$Wall->Friends_Updates($uid,$lastid,$type);
	$total=50;
	//$total=$Wall->Total_Friends_Updates($uid);

}
if(isset($uid))
{
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
   }
}


if($updatesarray)
{
	foreach($updatesarray as $data)
	{
		$msg_id=$data['msg_id'];
		$orimessage=$data['message'];
		$message=tolink(htmlcode($data['message']));
		$time=$data['created'];
		$mtime=date("c", $time);
		$username=$data['username'];
		$uploads=$data['uploads'];
		$type=$data['type'];
		$gameid=$data['game_id'];
		$gamename=$data['name'];
		$description=$data['description'];
		$seo_url=$data['seo_url'];
		$msg_uid=$data['uid_fk'];
		$channelurl=$this->Html->url(array("controller" => $data['seo_username'],"action" =>"")); 
		// User Avatar
		if($gravatar)
		   {
		    
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$msg_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
			
		   }
		else
		{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$msg_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
		
		}
		// End Avatar
?>
<div class="media">
                                                        <a class="pull-left" href="#">
                                                            <!--<img class="media-object" data-src="js/holder.js/64x64">-->
															<?php echo $cface; ?>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="<?php echo $channelurl ?>">Lorem ipsum </a><small class="helper-font-small">by <?php echo $username?> <?php echo $mtime; ?></small></h4>
                                                            <p><?php echo $message; ?></p>
															
														<?php
 if($uploads)
{
echo "<div style='margin-top:10px'>";
$s = explode(",", $uploads);
foreach($s as $a)
{
$newdata=$Wall->Get_Upload_Image_Id($a);
  if($newdata)
  {
  $uploadimageurl=Configure::read('S3.url').'/wall/'.$newdata['image_path'];
  echo "<a href='".$uploadimageurl."' rel='facebox'>".$this->Html->image(Configure::read('S3.url')."/wall/".$newdata['image_path'],array('rel'=>'facebox','class'=>'imgpreview'))."</a>";
  }
}
echo "</div>";
 }
 ?>	
                       
															
                                                            <div class="btn-group pull-right">
															    <?php if(isset($uid)) {?>
                                                                <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>">Approve</a>
																<?php }?>	
                                                                <a href="#" class="btn btn-mini">Invoice</a>
																<?php if(isset($uid) && $uid==$msg_uid) { ?>
                                                                <a href="#" class="btn btn-mini btn-danger stdelete" id="<?php echo $msg_id;?>">Delete</a>
																<?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
															
									
					
				
		


  <?php
  }
  }
else
echo '<div class="feed_status"><div class="upfeed"></div><div class="midfeed clearfix"><h3 id="noupdates" style="margin-top:0px !important">No Updates</h3></div><div class="botfeed"></div></div>';
?>