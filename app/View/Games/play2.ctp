

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
                    <ul class="gametitle">
                        <li class="clearfix"><span class="title">Author</span><span class="semicolon">:</span><span class="info"><?php echo $user['User']['username'] ?></span></li>
                        <li class="clearfix"><span class="title">Add Date</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['created'] ?></span></li>
                        <li class="clearfix"><span class="title">Category</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['category_id'] ?></span></li>
                        <li class="clearfix"><span class="title">Played</span><span class="semicolon">:</span><span class="info"><?php echo $game['Game']['rate_count'] ?></span></li>
        
                        <li class="clearfix"><span class="title">Favorite</span><span class="semicolon">:</span><div class="info"></div></li>
       
                    </ul>
                    <div class="rate">
                      <div class="ratepanel clearfix">
                        <p>Rate :</p>
                        <div class="ratecontainer">
                          <div data-bind="attr: { class: 'rating clearfix rating_' + viewModel.game.rating() }">
                            <a href="#" data-bind="click: function() { viewModel.game.rate(1); }"></a>
                            <a href="#" data-bind="click: function() { viewModel.game.rate(2); }"></a>
                            <a href="#" data-bind="click: function() { viewModel.game.rate(3); }"></a>
                            <a href="#" data-bind="click: function() { viewModel.game.rate(4); }"></a>
                            <a href="#" data-bind="click: function() { viewModel.game.rate(5); }"></a>
                          </div>
                        </div>
                      </div>
                      <div class="butonset">
                        <!-- AddThis Button BEGIN -->
                        <a class="addthis_button" href="http://www.addthis.com/bookmark.php">
                          <img style="float:left" src="/static/img/t_gameplay_share_single.png" width="152" height="38" border="0" alt="Share" /></a>
                        <script type="text/javascript">
    var addthis_config = {
        ui_cobrand: "Toork",
        ui_header_color: "#ffffff",
        ui_header_background: "#0B81C5",
        ui_hover_direction: -1,
        ui_language: 'en'
    }
 </script>  
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f2fe75c544991cf"></script>
<!-- AddThis Button END -->
                        
                        <a href="#" class="favorite" data-bind="visible: user.logged_in(), click: viewModel.game.favorite, css: { favorited: viewModel.game.like() }"></a>
                        <a href="#" class="fullscreen"></a>
                        <a href="#" class="flag" data-bind="css: { flaged: viewModel.game.malicious() }, click: viewModel.game.toggleMalicious"></a>
                      </div>
                    </div>
                </div>
                <div align="center"><?php echo $user['User']['adcode'] ?></div>
                <div class="fbcomment" align="center">
                    <fb:comments href="toork" num_posts="5" width="730" height="500"></fb:comments>
                </div>
            </div>
        </div>
    

	
	
  </div>
</div>