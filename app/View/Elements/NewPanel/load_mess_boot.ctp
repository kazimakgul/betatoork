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
<div class="media well" id="stbody<?php echo $msg_id;?>">
                                                        <a class="pull-left" href="#">
                                                            <!--<img class="media-object" data-src="js/holder.js/64x64">-->
															<?php echo $cface; ?>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $username?> </a><small class="helper-font-small"><a href='#' class="timeago" title='<?php echo $mtime; ?>'></a></small></h4>
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
                                                                <a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>">Comment</a>
																<?php }?>	
                                                                
				    <?php if($type==1){
				    $gamedata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_gamedata',$gameid));
			        if($gamedata['Game']['seo_url']!=NULL)
                    $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'play'));
                    else
                    $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($gamedata['Game']['id'])));	
				    echo '<a href="'.$playurl.'" class="btn btn-mini">Play</a> ';
				     }
				     ?>
					 
				<?php if($type==6){
				$gamedata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_gamedata',$gameid));
			    if($gamedata['Game']['seo_url']!=NULL)
                $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'play'));
                else
                $playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($gamedata['Game']['id'])));	
			    echo '<a href="'.$playurl.'" class="btn btn-mini">Play</a> '; 
				}
				?>
				
				<?php if($type==5){
				$channeldata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$gameid));
				if($channeldata['User']['seo_username']!=NULL)
                $playurl=$this->Html->url(array( "controller" => h($channeldata['User']['seo_username'])));
                $newsurl=$this->Html->url(array("controller"=> h($channeldata['User']['seo_username']),"action"=>"news"));
				echo '<a href="'.$playurl.'" class="btn btn-mini">'.$channeldata['User']['username'].'</a>'; 
				echo '<a href="'.$newsurl.'" class="btn btn-mini">News Feed</a> ';
				}
				?>
				
				<?php if(isset($uid) && $uid==$msg_uid) { ?>
                <a href="#" class="btn btn-mini btn-danger stdelete" id="<?php echo $msg_id;?>">Delete</a>
				<?php } ?>
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
				 
				 
				 <?php if($type==1) { 
			    $gameimage=$this->Upload->image($gamedata,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$gamename,'width'=>'200','height'=>'110','onerror'=>'imgError(this,"toorksize");'));
			    ?>
			 <div class="feedcontent clearfix">
                                        <div class="feedgameavatar">
                                            <?php echo $gameimage; ?>
                                        </div>   
                                        <div class="feedgamedesc">
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedgamedesctitle"><?php echo $gamename; ?></span></a>
                                            <span class="feedgamedescdesc"><?php echo $description; ?></span>
                                        </div>                                     
                                    </div>
						<?php } ?>
						
						
						<?php if($type==6) { 
			           $gameimage=$this->Upload->image($gamedata,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$gamename,'width'=>'200','height'=>'110','onerror'=>'imgError(this,"toorksize");'));
			?>
			 <div class="feedcontent clearfix">
                                        <div class="feedgameavatar">
                                            <?php echo $gameimage; ?>
                                        </div>   
                                        <div class="feedgamedesc">
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedgamedesctitle"><?php echo $gamename; ?></span></a>
                                            <span class="feedgamedescdesc"><?php echo $description; ?></span>
                                        </div>                                     
                                    </div>
						<?php } ?>
						
						
			  <?php if($type==5) { 
			  $channelimage=$this->Upload->image($channeldata,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");'));
			   ?>
			 <div class="feedcontent clearfix">
                                        <div class="feedchannelavatar">
                                            <?php echo $channelimage; ?>
                                        </div>   
                                        <div class="feedchanneldesc">
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedchanneldesctitle"><?php echo $channeldata['User']['username']; ?></span></a>
                                            <span class="feedchanneldescdesc"><?php echo $channeldata['User']['description']; ?></span>
											<span class="feedchannelanalytics"><?php echo $channeldata['User']['username'].' Activity'; ?></span>
											<ul>
                                                <li><?php echo $channeldata['Userstat']['uploadcount']; ?> Games Added</li>
                                                <li><?php echo $channeldata['Userstat']['favoritecount']; ?> Games Favorite</li>
												<li><?php echo $channeldata['Userstat']['subscribeto']; ?> Followers</li>
												<li><?php echo $channeldata['Userstat']['subscribe']; ?> Chains</li>
                                                <li><?php echo $channeldata['Userstat']['playcount']; ?> Games Played</li>
                                                
                                            </ul>

                                        </div>                                     
                                    </div>
					<?php } ?>
				 	
                                                        </div>
														
				<!-- Comment area begins -->				
					<div class="commentcontainer feedcomments" id="commentload<?php echo $msg_id;?>">
			<?php
				$x=1;
				echo $this->element('NewPanel/load_comments_boot',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); 
			?>
			</div>
			<div class="commentupdate feedcommentarea clearfix" style='display:none' id='commentbox<?php echo $msg_id;?>'>
				<div class="commentleft">
					<div class="commentavatarback">
						<?php echo $session_face;?>
					</div>
				</div>
				<div class="commentright">
					<textarea placeholder="Write a comment..." name="comment" class="commentarea" maxlength="200" cols="53" rows="2" id="ctextarea<?php echo $msg_id;?>"></textarea>
					<!--<textarea class="commentarea" cols="53" rows="2"></textarea>-->
					<div type="submit"  value=""  id="<?php echo $msg_id;?>" class="comment_button bootcommentbtn btn btn-primary ">Comment</div>
					<!--<a class="commentbtn" href="#"></a>-->
				</div>
			</div>
				<!-- Comment area ends-->										
														
                                                    </div>
										
		


<?php } ?>
<div id="content2"></div>

<?php
  if($total>$perpage)
  {
  ?>
 <!-- More Button here $msg_id values is a last message id value. -->
<div id="more<?php echo $msg_id; ?>" >
<a href="#" class="btn btn-small btn-link pull-right more" id="<?php echo $msg_id; ?>">View more &rarr;</a>
</div>

<?php } ?>

<?php } ?>