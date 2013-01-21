<?php
if(isset($type))
{
    switch($type)
	{
		case 1:
		$this->Html->css('feedgames', null, array('inline' => false));
		break;
		case 4:
		$this->Html->css('feedvideo', null, array('inline' => false));
		break;
		case 3:
		$this->Html->css('feedphoto', null, array('inline' => false));
		break;
	}	
}else{
	$this->Html->css('feedfeed', null, array('inline' => false));
}


$editlink=$this->Html->url(array('controller'=>'users','action'=>'edit',$channeldata['User']['id']));
$feedlink=$this->Html->url(array('controller'=>'wallentries','action'=>'wall'));
$gamelink=$this->Html->url(array('controller'=>'wallentries','action'=>'wall','games'));
$videolink=$this->Html->url(array('controller'=>'wallentries','action'=>'wall','videos'));
$photolink=$this->Html->url(array('controller'=>'wallentries','action'=>'wall','photos'));
?>
<div class="content clearfix">
	<div class="channel_left_panel">
	<?php  echo $this->element('channel_user_panel'); ?>
	<?php  echo $this->element('social'); ?>
	<?php echo $this->element('best_channels_left_menu'); ?>
	<?php echo $this->element('categories_left_menu'); ?>
	</div>
	<div class="right_panel clearfix">
		<div class="wall_leftside">
			<div id="wall_container">
				<div class="profilecover">
					<div class="upcover"></div>
					<div class="midcover">
						<img src="https://s3.amazonaws.com/betatoorkpics/brokenavatars/toork_wallcover.jpg" />
						<div class="channelfeeddesc">
							<div class="channeldescinfo"><?php echo $channeldata['User']['description']; ?> <a style='color:#FFFFFF;' href="<?php echo $editlink; ?>">(Edit)</a> </div>
						</div>
					</div>
					<div class="botcover"></div>
				</div>
				<div class="profilemenu">
					<ul class="wall_menu">
						<li class=""><a class="boardfeed wall_menu_item" href="<?php echo $feedlink; ?>"></a></li>
						<li class=""><a class="boardgames wall_menu_item" href="<?php echo $gamelink; ?>"></a></li>
						<li class=""><a class="boardphoto wall_menu_item" href="<?php echo $photolink; ?>"></a></li>
						<li class=""><a class="boardvideo wall_menu_item" href="<?php echo $videolink; ?>"></a></li>
					</ul>
					<div class="boardmenupointer"></div>
				</div>
				<div class="profilestatus">
					<div class="upstatus"></div>
					<div class="midstatus clearfix" id="wallstatus">
						<textarea placeholder="Share your idea about games or your channel... to add a video just copy paste a YouTube or Vimeo link" name="update" id="update" cols="70" rows="3"></textarea>
						<div id="webcam_container" class='border'>
							<div id="webcam" ></div>
							<div id="webcam_preview"></div>
							<div id='webcam_status'></div>
							<div id='webcam_takesnap'>
								<input type="button" value=" Take Snap " onclick="return takeSnap();" class="camclick button"/>
								<input type="hidden" id="webcam_count" />
							</div>
						</div>
						<div id="imageupload" class="border">
							<?php $image_ajax_url= $this->Html->url(array('controller'=>'Wallentries','action'=>'image_ajax'));?>
							<form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo $image_ajax_url; ?>'> 
								<div id='preview'></div>
								<span id='addphoto'>Add Photo:</span> <input type="file" name="photoimg" id="photoimg" />
								<input type='hidden' id='uploadvalues' />
							</form>
						</div>
						<div id="addgame_container" class='border'>
							<form id="gameaddform" name="gameaddform">
								<table>
									<tr>
										<td>Game Name</td><td>:</td><td><input class="inputborder" type="gamename" id="gamename" name="gamename" /></td>
									</tr>
									<tr>
										<td>Game Link</td><td>:</td><td><input class="inputborder" type="gamelink" id="gamelink" name="gamelink" /></td>
									</tr>
									<tr>
										<td>Game Embed Code</td><td>:</td><td><input class="inputborder" type="text" id="gameembedcode" name="gameembedcode" /></td>
									</tr>
									<tr>
										<td>Game Description</td><td>:</td><td><textarea class="walladdgamedesc" id="gamedesc" name="gamedesc"></textarea></td>
									</tr>	
									<tr>
										<td>Game Category</td><td>:</td>
										<td>
											<select class="selectinputborder" id="GameCategoryId" name="gamecategory">
												<option value="1">Action</option>
												<option value="2">Adventure</option>
												<option value="3">Race</option>
												<option value="4">Shooting</option>
												<option value="5">Board</option>
												<option value="6">Multiplayer</option>
												<option value="7">Puzzle</option>
												<option value="8">Card</option>
												<option value="9">Social</option>
												<option value="10">3D</option>
												<option value="11">Kids</option>
												<option value="12">Girls</option>
												<option value="13">Word</option>
												<option value="14">Role-Playing</option>
												<option value="15">Fighting</option>
												<option value="16">MMORPG</option>
												<option value="17">Sports</option>
											</select>
										</td>
									</tr>	
									<tr>
										<td>Game Image</td><td>:</td><td><input class="inputborder" type="file" name="gameimg" id="gameimg" /></td>
									</tr>								
								</table>
							</form>
						</div>						
						<div style="width:100%;clear:both">
							<div id='flashmessage'>
								<div id="flash" align="left"></div>
							</div>							
							<span style="float:right">
								<div type="submit" class="update_button" id="update_button" value="">Share</div>
								<a href="javascript:void(0);" id="camera" title="Upload Image"><!--<img src="<?php echo $this->webroot;?>app/webroot/img/wall/icons/camera.png" border="0" />--></a> 
								<!--<a href="javascript:void(0);" id="webcam_button" title="Webcam Snap"><img src="<?php echo $this->webroot;?>app/webroot/img/wall/icons/web-cam.png"  border="0" style='margin-top:5px'/></a>-->
								<a href="javascript:void(0);" id="addgame_button" title="Add Game"></a>
								<a href="javascript:void(0);" id="my_channel" title="My Channel">My Channel</a>
								
							</span>
						</div>	
					</div>
					<div class="botstatus"></div>                    
				</div>			
				<div id="content" class="profilefeed">
					<?php echo $this->element('wall/load_messages');?>
				</div>
			</div>				
		</div>
		<div class="wall_rightside">
			<div class="feedmayuknow">
				<div class="recommendedheader"></div>
				<div class="feedleftsep"></div>
				<div class="mayuknowcontent clearfix">
					<?php 
					foreach ($users as $follower): 
						$followid = $follower['User']['id'];
						$channelurl=$this->Html->url(array("controller" => $follower['User']['seo_username'],"action" =>"")); 
						$folurl=$this->Html->url(array("controller" => "games","action" =>"followers",$followid));
						$suburl=$this->Html->url(array("controller" => "games","action" =>"subscriptions",$followid));
						$playcounturl=$this->Html->url(array("controller" => "games","action" =>"playedgames",$followid));
						$avatarImage = $this->requestAction( array('controller' => 'users', 'action' => 'randomAvatar'));
						$facebook=$follower['User']['fb_link'];
						$twitter=$follower['User']['twitter_link'];
						$gplus=$follower['User']['gplus_link'];
						$website=$follower['User']['website'];
						if($facebook==NULL){
						  
						}else{
						  $facebook = "<a class='fb_link' href='$facebook' target='_blank' rel='nofollow'></a>";
						}
						if($twitter==NULL){
						}else{
						  $twitter = "<a class='twitter_link' href='$twitter' target='_blank' rel='nofollow'></a>";
						}
						if($gplus==NULL){
						}else{
						  $gplus = "<a class='gplus_link' href='$gplus' target='_blank' rel='nofollow'></a>";
						}
						if($website==NULL){
						}else{
						  $website = "<a class='website_link' href='$website' target='_blank' rel='nofollow'></a>";
						}
					?>
					<div class="subcard">
						<div class="subup clearfix">
							<a href="<?php echo $channelurl ?>" class="channelname"><?php echo $follower['User']['username']; ?></a>
							<?php if($this->Session->check('Auth.User')){?>
								<?php if(in_array($followid,$mutuals)){?>
									<a class="subcardchained" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a> 
								<?php }else {?>
									<a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a>
								<?php }?>
							<?php }?> 
						</div>
						<div class="submid clearfix">
							<div class="cardsep"></div>
							<div class="channelavatar">
							<?php 
							if($follower['User']['picture']==null) { 
								echo $this->Html->image("/img/avatars/$avatarImage.jpg", array("alt" => "toork avatar image",'width'=>'90','height'=>'120','url' => array("controller" => $follower['User']['seo_username'],"action" =>""))); 
							} else {
								echo $this->Upload->image($follower,'User.picture',array(),array('onerror'=>'imgError(this,"avatar");')); }
							?>
							</div>
							<ul>
								<li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['uploadcount']; ?> Added Games</a></li>
								<li class="clearfix"><a class="" href="<?php echo $channelurl ?>"><?php echo $follower['Userstat']['favoritecount']; ?> Favorite Games</a></li>
								<li class="clearfix"><a class="" href="<?php echo $playcounturl ?>"><?php echo $follower['Userstat']['playcount']; ?> Played Games</a></li>
								<li class="clearfix"><a class="" href="<?php echo $folurl ?>"><?php echo $follower['Userstat']['subscribeto']; ?> Followers</a></li>
								<li class="clearfix"><a class="" href="<?php echo $suburl ?>"><?php echo $follower['Userstat']['subscribe']; ?> Chains</a></li>
								<li class="clearfix"><div class="cardsep" style="margin-bottom:5px; margin-top:5px;"></div></li>
								<li class="clearfix">
								<?php
									echo $facebook;
									echo $twitter;
									echo $gplus;
									echo $website;
								?>
								</li>
							</ul>
						</div>
						<div class="subdown"></div>
					</div>
				<?php endforeach; ?>                                                                                                  
				</div>
			</div>
			<!--<div class="feedsponsorlinks">
				<div class="sponsorlinksheader"></div>
				<div class="feedleftsep"></div>
				<div class="sponsorlinkscontent">
					<img src="<?php echo $this->webroot;?>app/webroot/image/sponsorlink.png" />
				</div>                    
			</div>-->
			<div class="feedbestgames">
				<div class="bestgamesheader"></div>
				<div class="feedleftsep"></div>
				<div class="bestgamescontent">
				
				
<?php foreach ($suggestedgames as $game): ?>
<?php 
if($game['Game']['seo_url']!=NULL)
$playurl=$this->Html->url(array( "controller" => h($game['User']['seo_username']),"action" =>h($game['Game']['seo_url']),'play'));
else
$playurl=$this->Html->url(array( "controller" => "games","action" =>"play",h($game['Game']['id'])));	
 ?>					
				
				
				
				
					<div class="gamebox clearfix">
						<div class="greyback">
		<div class="whiteback">
			<a href="<?php echo $playurl ?>"><?php echo $this->Upload->image($game,'Game.picture',array('style' => 'toorksize'),array('class'=>'gamethumb','alt'=>$game['Game']['name'],'width'=>'200','height'=>'110','onerror'=>'imgError(this,"toorksize");')); ?></a>
		</div>
	</div>
						<div class="gb_rate">	
						
						<?php 
		
		if(81<=$game['Game']['starsize'] && $game['Game']['starsize']<=100)
		{
		$starvalue=0;
		}
		elseif(61<=$game['Game']['starsize'] && $game['Game']['starsize']<81)
		{
		$starvalue=-15;
		}
		elseif(41<=$game['Game']['starsize'] && $game['Game']['starsize']<61)
		{
		$starvalue=-30;
		}
		elseif(21<=$game['Game']['starsize'] && $game['Game']['starsize']<41)
		{
		$starvalue=-45;
		}
		elseif(0<$game['Game']['starsize'] && $game['Game']['starsize']<21)
		{
		$starvalue=-57;
		}
		elseif($game['Game']['starsize']==0)
		{
		$starvalue=-70;
		}
		
		?>
						
							<div class="ratingcontainer" id="rate">
								<div class="rating" style="background-position: <?php echo $starvalue;?>px 0px;">


		</div>
		</div>
		
		<div class="rateresult"><?php echo $game['Game']['starsize']; ?> %</div>
	</div>
	
	<?php $channelurl=$this->Html->url(array("controller" => $game['User']['seo_username'],"action" =>"")); ?>
	<a class="gb_channelname" href="<?php echo $channelurl ?>"><?php echo $game['User']['username']; ?></a>
	<a class="gb_gamename" href="<?php echo $playurl ?>"><?php echo $game['Game']['name']; ?></a>
</div>	
					<?php endforeach; ?>
					
					                                                                                                            
				</div>                      
			</div>
		</div>		
	</div>
</div>



