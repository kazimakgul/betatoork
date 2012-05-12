

<div class="content clearfix">
  <div class="channel_left_panel">
      <?php  echo $this->element('logged_user_panel'); ?>
      <?php  echo $this->element('subscribe'); ?>
      <?php  echo $this->element('social'); ?>
      <?php  echo $this->element('best_channels_left_menu'); ?>
      <?php  echo $this->element('categories_left_menu'); ?>
  </div>
  <div class="right_panel">

        <div class="greyback">
            <div class="whiteback">
                <div align="center"><?php echo $user['User']['adcode'] ?></div>
                <div class="gamedesc">
                    <p><?php echo $game['Game']['name'] ?></p>
                    <div class="sep"></div>
                    <span><?php echo $game['Game']['description'] ?></span>
                </div>
                <div class="game" align="center"><?php echo $game['Game']['embed'] ?></div>
                <div class="gameinfo clearfix">
<!--                     <ul class="gametitle">
                        <li class="clearfix"><span class="title">Author</span><span class="semicolon">:</span><span class="info"><?php echo $user['User']['username'] ?></span></li>
                        <li class="clearfix"><span class="title">Add Date</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['created'] ?></span></li>
                        <li class="clearfix"><span class="title">Category</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['category_id'] ?></span></li>
                        <li class="clearfix"><span class="title">Played</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['rate_count'] ?></span></li>
        
                        <li class="clearfix"><span class="title">Favorite</span><span class="semicolon">:</span><div class="info"></div></li>
       
                    </ul> -->
  
                      <div class="butonset">

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fae5d796f1a9f13"></script>
<!-- AddThis Button END -->


                        
<!--                         <a href="#" class="favorite" data-bind="visible: user.logged_in(), click: viewModel.game.favorite, css: { favorited: viewModel.game.like() }"></a>
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="flag" data-bind="css: { flaged: viewModel.game.malicious() }, click: viewModel.game.toggleMalicious"></a> -->
                      </div>
                   
                </div>
                <div align="center"><?php echo $user['User']['adcode'] ?></div>
                <div class="fbcomment" align="center"></br>
                    <div class="fb-comments" data-href="http://ec2-23-22-10-91.compute-1.amazonaws.com/betatoork/" data-num-posts="5" data-width="750"></div>
                </div>
            </div>
        </div>
    

	
	
  </div>
</div>