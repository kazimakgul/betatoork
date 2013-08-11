<?php
//Srinivas Tamada http://9lessons.info
//Loading Comments link with load_updates.php 

if(!isset($lastid) || $lastid=='')
$lastid=0;

if(!isset($type))
$type=NULL;

if(isset($uid))
{
	$updatesarray=$Wall->Updates($uid,$lastid,$type);
	$total=$Wall->Total_Updates($uid);
}

if(isset($uid))
{
   if($gravatar)
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'30','onerror'=>'imgError(this,"avatar");'));
   }
   else
   {
   $userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$uid));
   $session_face=$this->Upload->image($userdata,'User.picture',array(),array('width'=>'30','onerror'=>'imgError(this,"avatar");'));
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
			$cface=$this->Upload->image($userdata,'User.picture',array(),array("class"=>"img-polaroid",'width'=>'40','onerror'=>'imgError(this,"avatar");'));
			
		   }
		else
		{
			$userdata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$msg_uid));
			$cface=$this->Upload->image($userdata,'User.picture',array(),array("class"=>"img-polaroid",'width'=>'40','onerror'=>'imgError(this,"avatar");'));
		
		}
		// End Avatar
?>
<div class="media well shadow" style="background-color:white;" id="stbody2<?php echo $msg_id;?>">
                                                        <a class="pull-left" href="#">
                                                            <!--<img class="media-object" data-src="js/holder.js/64x64">-->
															<?php echo $cface; ?>
                                                        </a>
                                                        <h4 class="media-heading"><a href="<?php echo $channelurl ?>"><?php echo $username?> </a><small class="pull-right helper-font-small"><a href='#' class="timeago" title='<?php echo $mtime; ?>'></a></small></h4>
                                                            <p style="margin-left:60px;"><?php echo $message; ?></p>
                                                        <hr size="1">

                                                        <div class="media-body" style="text-align: center; margin:-7px;">
                                                            
															
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
  echo "<a href='".$uploadimageurl."' rel='facebox'>".$this->Html->image(Configure::read('S3.url')."/wall/".$newdata['image_path'],array('rel'=>'facebox','class'=>'span12 imgpreview'))."</a>";
  }
}
echo "</div>";
 }
 ?>
                  
                       
															
                                                            <div class="btn-group pull-right">
															  
                                                                
				    <?php if($type==1){
				    $gamedata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_gamedata',$gameid));
			        if($gamedata['Game']['seo_url']!=NULL)
      if($gamedata['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playgame'));
	  else
	  $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playframe'));
                    else
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($gamedata['Game']['id'])));		
				    echo '<a href="'.$playurl.'" class="btn btn-mini">Play</a> ';
				     }
				     ?>
					 
				<?php if($type==6){
				$gamedata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_gamedata',$gameid));
			        if($gamedata['Game']['seo_url']!=NULL)
      if($gamedata['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playgame'));
	  else
	  $playurl=$this->Html->url(array( "controller" => h($gamedata['User']['seo_username']),"action" =>h($gamedata['Game']['seo_url']),'playframe'));
                    else
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($gamedata['Game']['id'])));		
			    echo '<a href="'.$playurl.'" class="btn btn-mini">Play</a> '; 
				}
				?>
				
				<?php if($type==5){
				$channeldata = $this->requestAction( array('controller' => 'Wallentries', 'action' => 'get_userdata',$gameid));
				if($channeldata['User']['seo_username']!=NULL)
                $playurl=$this->Html->url(array( "controller" => h($channeldata['User']['seo_username'])));
                $newsurl=$this->Html->url(array("controller"=> h($channeldata['User']['seo_username']),"action"=>"news"));
				}
				?>
				

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
			 <div class="well shadow feedcontent clearfix span11" style="margin:20px; padding:5px;">
                                        <div class="feedgameavatar" style="padding-right:5px;">
                                            <?php echo $gameimage; ?>
                                        </div>   
                                        <div>
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedgamedesctitle"><?php echo $gamename; ?></span></a>
                                            <p class="helper-font-9"><?php echo $description; ?></p>
                                        </div>                                     
                                    </div>
						<?php } ?>
						
						
						<?php if($type==6) { 
			           $gameimage=$this->Upload->image($gamedata,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$gamename,'width'=>'200','height'=>'110','onerror'=>'imgError(this,"toorksize");'));
			?>
			 <div class="well shadow feedcontent clearfix span11" style="margin:20px; padding:5px;">
                                        <div class="feedgameavatar" style="padding-right:5px;">
                                            <?php echo $gameimage; ?>
                                        </div>   
                                        <div>
                                            <a class="gb_gamename" href="<?php echo $playurl ?>"><span class="feedgamedesctitle"><?php echo $gamename; ?></span></a>
                                            <p class="helper-font-9"><?php echo $description; ?></p>
                                        </div>                                     
                                    </div>
						<?php } ?>
						
						
			  <?php if($type==5) { 
			  $channelimage=$this->Upload->image($channeldata,'User.picture',array(),array('width'=>'50px','onerror'=>'imgError(this,"avatar");'));
			   ?>
			 <div class="offset2 feedcontent clearfix well well-small span8 shadow">
                                        
                                            <a class="pull-left"><?php echo $channelimage; ?></a>
                                        
                                        <div class="feedchanneldesc">
											<span class="bold"><?php echo '<a href="'.$playurl.'" class="btn">'.$channeldata['User']['username'].'</a>'; ?></span>
											

					<p style="font-family: 'Merriweather Sans', sans-serif; font-size: 12px; margin-top:7px;">
                    	<i class="helper-font-16 elusive-group color-blue"></i> <?php echo $channeldata['Userstat']['subscribeto']; ?> Followers 
                    	<i class="helper-font-16 elusive-star-alt color-red"></i> <?php echo $channeldata['Userstat']['uploadcount']; ?> Games
                	</p>

                                               
                                                
                                           

                                        </div>                                     
                                    </div>
					<?php } ?>
				 	
                                                        </div>
														
				<!-- Comment area begins -->				
					<div style="margin-top:10px;" id="commentload<?php echo $msg_id;?>">
			<?php
				$x=1;
				echo $this->element('NewPanel/load_comments_boot',array('msg_id'=>$msg_id,'x'=>$x,'msg_uid'=>$msg_uid)); 
			?>
			</div>
			</br>
			  	<?php if(isset($uid)) {?>
            	<a href="#" class="btn btn-mini commentopen" id="<?php echo $msg_id;?>"><i class="elusive-comment"></i> Comment</a>
            	<a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-thumbs-up"></i> Like</a>
            	<a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-asl"></i> Agree</a>
            	<a href="#" class="btn btn-mini" id="<?php echo $msg_id;?>"><i class="elusive-thumbs-down"></i> Disagree</a>
				<?php }?>
								<?php if(isset($uid) && $uid==$msg_uid) { ?>
                <a href="#" class="btn btn-mini pull-right stdelete" id="<?php echo $msg_id;?>"><i class="elusive-trash"></i> Delete</a>
				<?php } ?>
			
			<hr size="3">
			<div class="row-fluid commentupdate clearfix" style='display:none' id='commentbox<?php echo $msg_id;?>'>

					<div class="span1">
						<?php echo $session_face;?>
					</div>

				<div class="span11">
					<textarea placeholder="Write a comment..." name="comment" maxlength="200" class="pull-right span12" rows="1" id="ctextarea<?php echo $msg_id;?>"></textarea>
					<!--<textarea class="commentarea" cols="53" rows="2"></textarea>-->
					<div type="submit"  value=""  id="<?php echo $msg_id;?>" class="pull-right comment_button btn btn-small btn-info">Comment</div>
					<!--<a class="commentbtn" href="#"></a>-->
				</div>
			</div>
				<!-- Comment area ends-->										
														
                                                    </div>
										
		


<?php } ?>
<div id="my_content"></div>

<?php
  if($total>$perpage)
  {
  ?>
 <!-- More Button here $msg_id values is a last message id value. -->
<div id="my_more<?php echo $msg_id; ?>" >
<a href="#" class="btn btn-small btn-link pull-right my_more" id="<?php echo $msg_id; ?>">View more &rarr;</a>
</div>

<?php } ?>

<?php } ?>