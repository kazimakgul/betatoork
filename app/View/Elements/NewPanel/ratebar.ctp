<div class="navbar navbar-fixed-bottom">
  <div class="header-control">
      <div class="navbar-inner" style="-webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0;">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse">
            <div class="row-fluid">

              <div class="span3">
<a class="btn" style="margin:5px;" href="<?php echo $profilepublic; ?> ">  
  <?php 
  if($game['User']['picture']==null) { 
    echo $this->Html->image("/img/avatars/$avatarImage.jpg", array('width'=>'12',"alt" => "toork avatar image",'url' => array('controller' => 'games', 'action' => 'usergames', $userid))); 
    } else {
      echo $this->Upload->image($game,'User.picture',array(),array('align'=>'middle','title'=>'myUsername','width'=>'12','onerror'=>'imgError(this,"avatar");')); }
  ?> <?php echo $game['User']['username'] ?> <i class="color-red icofont-bolt"></i>
</a>

              </div>

<!-- Google SEO icin -> arama motorunda oyunlarin yildizlarini aldigi oy sayisini gostermesi icin gerekli.

Ornek=1:
<div itemscope itemtype="http://schema.org/Product">
  <img itemprop="image" src="dell-30in-lcd.jpg" />
  <span itemprop="name">Dell UltraSharp 30" LCD Monitor</span>

  <div itemprop="aggregateRating"
    itemscope itemtype="http://schema.org/AggregateRating">
    <span itemprop="ratingValue">37</span>
    out of <span itemprop="bestRating">100</span>
    based on <span itemprop="ratingCount">24</span> user ratings
  </div>

 <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <span itemprop="price">$0</span>
  </div>

  Product description:
  <span itemprop="description">0.7 cubic feet countertop microwave.
  Has six preset cooking categories and convenience features like
  Add-A-Minute and Child Lock.</span>

</div>

Ornek=2:
<div xmlns:v="http://rdf.data-vocabulary.org" typeof="v:Review-aggregate">

   <span rel="v:rating">
    <span class="rating" property="v:average">4.3</span>
        <span id="rating-count"> <span property="v:votes">418</span> ratings </span>
   </span>

</div>
-->

<!-=================================================================->
<!---------------Generate Play Url for Random Game----------------->
<!-=================================================================->
<?php 

if($randomgame['Game']['seo_url']!=NULL)
{
      if($randomgame['Game']['embed']!=NULL)
      $playurl=$this->Html->url(array( "controller" => h($randomgame['User']['seo_username']),"action" =>h($randomgame['Game']['seo_url']),'playgame'));
	  else
	  $playurl=$this->Html->url(array( "controller" => h($randomgame['User']['seo_username']),"action" =>h($randomgame['Game']['seo_url']),'playframe'));
}
else{
    $playurl=$this->Html->url(array( "controller" => "games","action" =>"gameswitch",h($randomgame['Game']['id'])));
}
?>
<!-=================================================================->
<!---------------/Generate Play Url for Random Game----------------->
<!-=================================================================->
<!----Declare Channel Name For JavaScript Usage---->
  <!----=========================================---->
  <script>
  <?php if($this->Session->check('Auth.User') == 1){ ?>
  user_auth=1;
  <?php }else{?>
  user_auth=0;
  <?php }?>
  checkFavStat='<?php echo $this->Html->url(array('controller'=>'games','action'=>'favorite_check')); ?>';
  game_id='<?php echo $game['Game']['id']; ?>';
  </script>
  <!----=========================================---->


              
			  
			  
			  <div class="span3 helper-font-32">
                 <div class="pull-right" style="margin-top:5px;">
	
	
	<!--**************************-->  
	<!--32px Rating Stars Starts Below-->	
	<!--**************************-->	  
	<?php echo  $this->element('NewPanel/rating_stars_32'); ?>
	<!--**************************-->  
	<!--/32px Rating Stars Ends Below-->	
	<!--**************************-->	
		
		
		</div>
              </div>
			  
			  
              <div class="span5 helper-font-32">
                <ul>
                  <li rel="tooltip" data-placement="top" data-original-title="Next Game (<?php echo $randomgame['Game']['name'];?>)" class="btn pull-right color-blue" style="margin:5px;">
                      <a href="<?php echo $playurl;?>"><i class="elusive-fire"></i> Next <i class="elusive-circle-arrow-right"></i></a>
                  </li>
                  <li rel="tooltip" id="fav_button2" onclick="favorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);" data-placement="top" data-original-title="Add to Favorites" class="btn btn-danger pull-right" style="margin:5px;">
                      <i class="elusive-heart"></i>
                  </li>
				          <li rel="tooltip" id="unFav_button2" onclick="unFavorite('<?php echo $game['Game']['name'];?>',user_auth,<?php echo $game['Game']['id'];?>);" data-placement="top" data-original-title="Remove from Favorites" class="btn pull-right color-red" style="margin:5px; display:none;">
                      <i class="elusive-heart-empty"></i>
                  </li>
                 <li rel="tooltip" id="comment" data-toggle="popover" data-placement="top" data-html="true" title="Comment" data-placement="top" data-original-title="Comment" class="btn pull-right color-green" style="margin:5px;"data-content='

                <form class="navbar-form ">
                    <textarea class="span12" id="game_comment" rows="4" placeholder="What do you think about this game?">#<?php echo $game["Game"]["seo_url"];?> </textarea>
					<input type="hidden" id="game_id" value="<?php echo $game["Game"]["id"];?>">
                 </br>
                  <button type="button" id="success-post3" class="btn btn-info pull-right update_game_comment">Comment</button>
                </form></br>
                  '>
                      <i class="elusive-comment"></i>
                  </li>
                 <li rel="tooltip" id="ratebarshare" data-toggle="popover" data-placement="top" data-html="true" title="Share" data-placement="top" data-original-title="Share" class="btn pull-right color-blue" style="margin:5px;"data-content='

                  <?php echo  $this->element("NewPanel/share"); ?>

                  '>
                      <i class="elusive-share"></i>
                  </li>

                 <li rel="tooltip" id="ratebarchain" data-toggle="popover" data-placement="top" data-html="true" title="Chain This Game" data-placement="top" data-original-title="Chain to Game" class="btn pull-right btn-info" style="margin:5px;"data-content='
                        <p class="alert alert-info" STYLE="font-size:10pt;">A clone of this game will be created in your games section and you will be able to edit the game as you wish.</p>
                        <a class="btn btn-danger btn-small btn-block">
                            <div class="helper-font-16">
                            <i class="elusive-circle-arrow-right"> Chain Now !</i>
                            </div>
                        </a>
                        <p STYLE="font-size:10pt;">
                          Its the easy way of adding a game to your channel.</p>
                  '>
                      <i class="icofont-link"></i>
                  </li>

                </ul>
              </div>
            </div>

<?php
if($this->Session->check('Auth.User')){
?>

        <button style="margin:-30px 0px 0px 0px;" onclick="$.pnotify({
            title: 'Rate Bar Removed',
            text: 'If you want to have your rate bar back, Just refresh your browser.',
            type: 'info'
          });"  rel="tooltip" data-placement="top" data-original-title="Remove This Bar" data-box="close" data-hide="fadeOut" class="close"><i class="elusive-remove-circle"></i></button> 

<?php
}else{
?>

        <button style="margin:-30px 0px 0px 0px;" onclick="$.pnotify({
            title: 'Sign Up For Free',
            text: 'If you want to remove this rate bar, You have to be a member of Toork. Dont worry its for free',
            type: 'error'
          });"  rel="tooltip" data-placement="top" data-original-title="Remove This Bar" class="close"><i class="elusive-remove-circle"></i></button> 

<?php
}
?>

          </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
      </div><!-- /navbar-inner -->
    </div>
  </div>