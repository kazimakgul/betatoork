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

$feedlink=$this->Html->url(array('controller'=>$channeldata['User']['seo_username'],'action'=>'news'));
$gamelink=$this->Html->url(array('controller'=>$channeldata['User']['seo_username'],'action'=>'news','games'));
$videolink=$this->Html->url(array('controller'=>$channeldata['User']['seo_username'],'action'=>'news','videos'));
$photolink=$this->Html->url(array('controller'=>$channeldata['User']['seo_username'],'action'=>'news','photos'));
?>
<div class="content clearfix">
	<div class="channel_left_panel">
		<?php echo $this->element('logged_user_panel'); ?>
		<?php echo $this->element('subscribe'); ?>
		<?php echo $this->element('social'); ?>
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
						<div class="channeldescviewport">
							<div class="channelfeeddescback">
								<a href="javascript:void(0);" class="showdesc"></a>
								<div class="channelfeeddesc">
									<div class="channeldescinfo"><?php echo $channeldata['User']['description']; ?></div>
								</div>
							</div>
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
							<?php //if($this->Session->check('Auth.User')){?>
								<?php //if(in_array($followid,$mutuals)){?>
									<!--<a class="subcardchained" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a> -->
								<?php //}else {?>
									<a class="subcardchain" style="float:right" onclick="javascript:changechain(<?php echo $follower['User']['id']; ?>,$(this));"></a>
								<?php //}?> 
							<?php //}?>
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



